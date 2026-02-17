<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Ichtrojan\Otp\Otp;
use Illuminate\Database\QueryException;
use App\Mail\EmailActivationOtp;
use App\Models\Device;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

// class RegisteredUserController extends Controller
// {
//     public function store(Request $request)
//     {
//         $data = $request->validate(
//             [
//                 "alias_handle_1" => ["required", "string", "max:255"],
//                 "alias_handle_2" => ["required", "string", "max:255"],
//                 "link_token" => ["required", "email", "unique:users,email"],
//                 "contact_seq" => "required|digits:9|unique:users,phone_number",
//                 "secret_hash" => ["required", Password::defaults()],
//                 "bio_flag" => "required|in:male,female",
//                 "open_token" => ['required', 'string']
//             ],
//             [
//                 "alias_handle.required" => "Fullname is required.",
//                 "alias_handle.string" => "Fullname must be a valid string.",
//                 "alias_handle.max" => "Fullname must not exceed 255 characters.",

//                 "link_token.required" => "Email is required.",
//                 "link_token.email" => "Email must be a valid email address.",
//                 "link_token.unique" => "Invalid credentials.",

//                 "contact_seq.required" => "Phone number is required.",
//                 "contact_seq.digits" => "Phone number must be exactly 9 digits.",
//                 "contact_seq.unique" => "Phone number has already been taken.",

//                 "secret_hash.required" => "Password is required.",
//                 "bio_flag.required" => "Gender is required.",
//                 "bio_flag.in" => "Gender must be either male or female.",
//             ]
//         );

//         try {
//             //open token from phone /public key
//             //maybe use a transaction
//             $user = new User;
//             $user->name = $data["alias_handle_1"];
//             $user->surname = $data["alias_handle_2"];
//             $user->email = $data["link_token"];
//             $user->phone_number =  $data["contact_seq"];
//             $user->password =  Hash::make($data["secret_hash"]);
//             $user->gender = $data["bio_flag"];
//             $user->save();
//             //
//             if ($user) {
//                 $device = Device::create([
//                     "user_id" => $user->id,
//                     "device_uuid" => Str::uuid()->toString(),
//                     "public_key" => $data["open_token"]
//                 ]);
//             }
//         } catch (QueryException $e) {
//             return response()->json([
//                 "success" => false,
//                 "message" => "An error occured.
//                 Account was not created",
//             ], 500);
//         }
//         //

//         try {
//             $code = (new Otp)->generate($user->email, 'numeric', 6, 10);
//             if ($code->status) {
//                 Mail::to($user->email)->queue(new EmailActivationOtp($user->name, $code->token));
//                 return response()->json([
//                     "success" => true,
//                     "message" => "User account created successfully.
//                 An otp code has being sent to your email",
//                     "data" => null
//                 ], 201);
//             } else {
//                 return response()->json(
//                     [
//                         "success" => false,
//                         "message" => "Try again an error occured",
//                         "data" => null
//                     ],
//                     500
//                 );
//             }
//         } catch (\Exception $e) {
//             // This will print the EXACT error from Brevo in your Render 'Logs' tab
//             Log::error("Registration Mail Error: " . $e->getMessage());

//             return response()->json([
//                 "success" => false,
//                 "message" => "Email could not be sent" . $e->getMessage(),
//                 "data" => null
//             ], 500);
//         }
//     }
//     // App shows the OTP entry screen
//     // app sends otp with email
//     public function activateAccount(Request $request)
//     {

//         $data = $request->validate(["code" => "required|size:6", "link_token" => "required|email"]);
//         // $user = User::with('device:id,is_active,device_uuid,devices.user_id')->select('email_verified_at', 'is_active','id','email')->where('email',$data["link_token"])->firstorFail();
//         $user = User::with("device")->firstOrFail();
//         if (!$user) {
//             return response()->json([
//                 "success" => false,
//                 "message" => "Invalid email or verification code.",
//                 "data" => null
//             ], 404);
//         }
//         $token = $user->createToken('auth_token', ['*'], now()->addMonths(3))->plainTextToken;
//         $code = (new Otp)->validate($user->email, $data["code"]);
//         // dd($code);
//         if ($code->status && $token) {
//             $user->update(["is_active" => true, "email_verified_at" => now()]);
//             $user->device->update(["is_active" => true]);
//             return response()->json([
//                 "success" => true,
//                 "message" => "Account successfully activated and device linked.",
//                 "data" => [
//                     "uuid" => $user->device->device_uuid,
//                     "token" => $token,
//                 ]
//             ], 201);
//         } else {
//             return response()->json([
//                 "success" => false,
//                 "message" => "An error occured, Request for a new token",
//                 "data" => [
//                     "token" => "Request for a new token(Note: They expire in 10 minutes)",
//                 ]
//             ], 400);
//         }
//     }

//     public function resendActivationOtp(Request $request)
//     {
//         $data = $request->validate(["link_token" => "required|email"]);
//         $user = User::where("email", $data["link_token"])->first();
//         if (!$user) {
//             return response()->json([
//                 "success" => false,
//                 "message" => "Invalid email address.",
//                 "data" => null

//             ], 404);
//         }
//         $code = (new Otp)->generate($user->email, 'numeric', 6, 10);
//         if ($code->status) {
//             Mail::to($user->email)->queue(new EmailActivationOtp($user->name, $code->token));
//             return response()->json([
//                 "success" => true,
//                 "message" => "A new otp code has being sent to your email",
//                 "data" => null
//             ], 201);
//         } else {
//             return response()->json(
//                 [
//                     "success" => false,
//                     "message" => "Try again an error occured",
//                     "data" => null
//                 ],
//                 500
//             );
//         }
//     }
// }




class RegisteredUserController extends Controller
{
    /**
     * Handle Account Registration
     */
    public function store(Request $request)
    {
        // 1. Validation (Laravel automatically returns 422 if this fails)
        $data = $request->validate([
            "alias_handle_1" => ["required", "string", "max:255"],
            "alias_handle_2" => ["sometimes", "string", "max:255"],
            "link_token"     => ["required", "email", "unique:users,email"],
            "secret_hash"    => ["required", Password::defaults()],
            "open_token"     => ["required", "string"] // The Public Key from Android
        ], [
            "link_token.unique" => "This email is already registered.",
            "contact_seq.unique" => "This phone number is already registered.",
        ]);

        // 2. Database Operations (using a Transaction for safety)

        try {
            $user = User::create([
                "name"         => $data["alias_handle_1"],
                "surname"      => $data["alias_handle_2"],
                "email"        => $data["link_token"],
                "password"     => Hash::make($data["secret_hash"]),
            ]);

            Device::create([
                "user_id"     => $user->id,
                "device_uuid" => (string) Str::uuid(),
                "public_key"  => $data["open_token"],
                "is_active"   => false // Active only after OTP
            ]);

            // 3. OTP Generation
            $otpResponse = (new Otp)->generate($user->email, 'numeric', 6, 10);

            if (!$otpResponse->status) {
                throw new \Exception("Failed to generate OTP.");
            }

            // 4. Send Email
            Mail::to($user->email)->queue(new EmailActivationOtp($user->name, $otpResponse->token));


            return response()->json([
                "success" => true,
                "message" => "Account created successfully. Please check your email for the verification code.",
                "data"    => null 
            ], 201);

        } catch (\Exception $e) {

            Log::error("Registration Error: " . $e->getMessage());
            
            return response()->json([
                "success" => false,
                "message" => "Could not complete registration. Please try again later.",
                "data"    => null
            ], 500);
        }
    }

    /**
     * Handle OTP Verification & Account Activation
     */
    public function activateAccount(Request $request)
    {
        $request->validate([
            "code"       => ["required", "size:6"],
            "link_token" => ["required", "email"]
        ]);

        // $user = User::with("device")->where("email", $request->link_token)->first();
        $user = User::with('device:id,is_active,device_uuid,devices.user_id')->select('email_verified_at', 'is_active','id','email')->where('email',$request->link_token)->first();

        if (!$user) {
            return response()->json([
                "success" => false,
                "message" => "No account found with this email.",
                "data"    => null
            ], 404);
        }

        // Validate OTP
        $otpCheck = (new Otp)->validate($user->email, $request->code);

        if ($otpCheck->status) {
            // Update User and Device
            $user->update([
                "is_active" => true, 
                "email_verified_at" => now()
            ]);

            if ($user->device) {
                $user->device->update(["is_active" => true]);
            }

            // Create Sanctum Token
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                "success" => true,
                "message" => "Account successfully activated.",
                "data"    => [
                    "uuid"  => $user->device->device_uuid ?? null,
                    "token" => $token,
                ]
            ], 200);
        }

        return response()->json([
            "success" => false,
            "message" => "Invalid or expired verification code.",
            "data"    => [
                "error_type" => "INVALID_OTP"
            ]
        ], 400);
    }

    /**
     * Resend OTP
     */
    public function resendActivationOtp(Request $request)
    {
        $request->validate(["link_token" => "required|email"]);

        $user = User::where("email", $request->link_token)->first();

        if (!$user || $user->is_active) {
            return response()->json([
                "success" => false,
                "message" => "Request denied. Account may already be active.",
                "data"    => null
            ], 400);
        }

        $otpResponse = (new Otp)->generate($user->email, 'numeric', 6, 10);

        if ($otpResponse->status) {
            Mail::to($user->email)->queue(new EmailActivationOtp($user->name, $otpResponse->token));
            
            return response()->json([
                "success" => true,
                "message" => "A new code has been sent to your email.",
                "data"    => null
            ], 200);
        }

        return response()->json([
            "success" => false,
            "message" => "Failed to resend code. Try again later.",
            "data"    => null
        ], 500);
    }
}
