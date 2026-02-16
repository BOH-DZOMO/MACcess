<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Laravel\Sanctum\PersonalAccessToken;
use Ichtrojan\Otp\Otp;
use Illuminate\Database\QueryException;
use App\Mail\EmailActivationOtp;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $data = $request->validate(
            [
                "alias_handle" => ["required", "string", "max:255"],
                "link_token" => ["required", "email", "unique:users,email"],
                "contact_seq" => "required|digits:9|unique:users,phone_number",
                "secret_hash" => ["required", Password::defaults()],
                "bio_flag" => "required|in:male,female",
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
            $user = new User;
            $user->fullname = $data["alias_handle"];
            $user->email = $data["link_token"];
            $user->phone_number =  $data["contact_seq"];
            $user->password =  Hash::make($data["secret_hash"]);
            $user->gender = $data["bio_flag"];
            $user->save();
        } catch (QueryException $e) {
            return response()->json([                
                "success"=> false,
                "message"=> "An error occured.
                Account was not created",
            ],500);
        }
        $code = (new Otp)->generate($user->email, 'numeric', 6, 10);
        $token = $user->createToken('auth_token')->plainTextToken;
        if ($token && $code->status) {
            Mail::to($user->email)->queue(new EmailActivationOtp($user->name,$code));
            return response()->json([
                "success" => true,
                "message" => "User created successfully,",
                "data" => [
                    "token" => $token,
                    "code" => $code,
                ]
            ],201);
        } else {
            return response()->json([
                "success" => false,
                "message" => "User created successfully.
                Token generation failed.Try again an error occured"]
            ,500);
        }     
    }

    public function login(LoginRequest $request)
    {
       
            //try to signin users and check their public key/open_hash to see if it matches with the account
        $request->authenticate();
        $user = Auth::user();
        $user->tokens()->where("name", "auth_token")->delete();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            "status" => "success",
            "message" => "User log in successfull",
            "token" => $token
        ], 201);
        
        //    else {
        // # if it doesn't match it will surely mean that they its on 
        // #a different phone and we will like top call enroll before using account

        //  return response()->json([
        //         "status" => "failed",
        //         "message" => "",
        //         "error" => "device already linked with another account,wait for confirmation--maybe 24hrs"
        //     ]);

        //    }
    }

    /**
     * Store a newly created resource in storage.
     */

    public function verifyAccount(Request $request)
    {
        $user = $request->user();
        $user->tokens()->where("name", "otp_verification_token")->delete();
        $code = "123579";
        $token = $user->createToken('otp_verification_token', ['*'], now()->addUTCMinutes(3))->plainTextToken;
        $user->update(["email_otp_code" => $code]);
        return response()->json([
            "token" => $token,
            "code" => $code,
            "message" => "Use this code to verify account"
        ]);
    }

    public function confirmAccount(Request $request)
    {
        $data = $request->validate(
            [
                "code" => "required|size:6",
                "otp_token" => "required"
            ]
        );
        $otp_token = $data["otp_token"];
        $user = $request->user();
        $verify_token = PersonalAccessToken::findToken($otp_token);
        if ($verify_token->expires_at && $verify_token->expires_at->isNowOrFuture()) {
            if ($user->email_otp_code === $data["code"]) {
                $user->update(["is_active" => true, "email_verified_at" => now(), "email_otp_code" => ""]);
                return response()->json(["message" => "Account succesfully verified"]);
            } else {
                return response()->json(["message" => "try again incorrect otp code entered"]);
            }
        } else {
            return response()->json(["message" => "token invalid"]);
        }
    }
}
