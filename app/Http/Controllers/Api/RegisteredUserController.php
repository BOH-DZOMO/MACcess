<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Ichtrojan\Otp\Otp;
use Illuminate\Database\QueryException;
use App\Mail\emailActivationOtp;
use App\Models\Device;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                "alias_handle_1" => ["required", "string", "max:255"],
                "alias_handle_2" => ["required", "string", "max:255"],
                "link_token" => ["required", "email", "unique:users,email"],
                "contact_seq" => "required|digits:9|unique:users,phone_number",
                "secret_hash" => ["required", Password::defaults()],
                "bio_flag" => "required|in:male,female",
                "open_token" => ['required','string']
            ],
            [
                "alias_handle.required" => "Fullname is required.",
                "alias_handle.string" => "Fullname must be a valid string.",
                "alias_handle.max" => "Fullname must not exceed 255 characters.",

                "link_token.required" => "Email is required.",
                "link_token.email" => "Email must be a valid email address.",
                "link_token.unique" => "Invalid credentials.",

                "contact_seq.required" => "Phone number is required.",
                "contact_seq.digits" => "Phone number must be exactly 9 digits.",
                "contact_seq.unique" => "Phone number has already been taken.",

                "secret_hash.required" => "Password is required.",
                "bio_flag.required" => "Gender is required.",
                "bio_flag.in" => "Gender must be either male or female.",
            ]
        );

        try {
            //open token from phone /public key
            //maybe use a transaction
            $user = new User;
            $user->name = $data["alias_handle_1"];
            $user->surname = $data["alias_handle_2"];
            $user->email = $data["link_token"];
            $user->phone_number =  $data["contact_seq"];
            $user->password =  Hash::make($data["secret_hash"]);
            $user->gender = $data["bio_flag"];
            $user->save();
            //
            if ($user) {
                $device = Device::create([
                "user_id" => $user->id,
                "device_uuid" => Str::uuid()->toString(),
                "public_key" => $data["open_token"]
            ]);
            }
        } catch (QueryException $e) {
            return response()->json([               
                "success"=> false,
                "message"=> "An error occured.
                Account was not created",
            ],500);
        }
        //

        $code = (new Otp)->generate($user->email, 'numeric', 6, 10);
        if ( $code->status) {
            Mail::to($user->email)->queue(new emailActivationOtp($user->name,$code->token));
            return response()->json([
                "success" => true,
                "message" => "User account created successfully.
                An otp code has being sent to your email",
                // "data" => [
                //     "code" => $code
                // ]
            ],201);
        } else {
            return response()->json([
                "success" => false,
                "message" => "Try again an error occured"]
            ,500);
        }     
    }
    // App shows the OTP entry screen
    // app sends otp with email
     public function activateAccount(Request $request)
    {
        
        $data = $request->validate(["code" => "required|size:6","link_token" => "required|email"]);
        // $user = User::with('device:id,is_active,device_uuid')->select('email_verified_at', 'is_active','id','email')->where('email',$data["link_token"])->firstorFail();
        $user = User::with("device")->firstOrFail();
        if (!$user) {
            return response()->json([
                "success" => false,
                "message" => "Invalid email or verification code."
            ], 404);
        }
        $token = $user->createToken('auth_token',['*'],now()->addMonths(3))->plainTextToken;
        $code = (new Otp)->validate($user->email,$data["code"]);
        // dd($code);
        if ($code->status && $token) {
            $user->update(["is_active" => true, "email_verified_at" => now()]);
            $user->device->update(["is_active" => true]);
            return response()->json([
                "success" => true,
                "message" => "Account successfully activated and device linked.",
                "data" => [
                    "uuid" => $user->device->device_uuid,
                    "token" => $token,
                ]
                ],201);
        }
        else {
              return response()->json([
                "success" => false,
                "message" => "An error occured, Request for a new token",
                "error" => [
                    "token" => "Request for a new token(Note: They expire in 10 minutes)",
                ]
                ],201);
        }
    }
}
