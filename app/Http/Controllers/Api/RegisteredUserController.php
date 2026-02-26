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
            "alias_handle_2" => ["nullable", "string", "max:255"],
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
