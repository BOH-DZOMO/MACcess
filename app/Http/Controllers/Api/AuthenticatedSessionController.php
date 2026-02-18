<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthenticatedSessionRequest;
use App\Models\Device;
use App\Models\User;
use Ichtrojan\Otp\Otp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{


    public function store(AuthenticatedSessionRequest $request)
    {
        // $request->authenticate(); 
        try {
            $result = $request->authenticate();

            if ($result['action'] === "login") {
                return response()->json([
                    "success" => true,
                    "message" => "Login successful",
                    "data"    => ["token" => $result['token']]
                ], 200);
            }

            if ($result['action'] === "enroll") {
                return response()->json([
                    "success" => true,
                    "message" => $result['message'],
                    "data"    => null
                ], 202); // 202 Accepted (Processing)
            }
        } catch (ValidationException $e) {
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "data"    => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                // "message" => "An error occurred during login.",
                "message" => "Server Error: " . $e->getMessage(),
                "data"    => null
            ], 500);
        }
    }

    public function verify(Request $request)
    {

        // $data = $request->validate(["code" => "required|size:6","link_token" => "required|email"]);
        // $user = User::with('devices:id,devices.user_id,is_active,device_uuid')->where('email',$data["link_token"])->where("is_active",true)->firstorFail();
        // if (!$user) {
        //     return response()->json([
        //         "success" => false,
        //         "message" => "Invalid email or verification code."
        //     ], 404);
        // }
        // if ((new Otp())->validate($user->email,$data["code"])->status) {
        //     $device = Device::create([
        //     "user_id" => $user->id,
        //     "device_uuid" => Str::uuid()->toString(),
        //     "public_key" => $data["open_token"]
        // ]);
        //     $user->device->update(["is_active" => true]);
        //     return response()->json([
        //         "success" => true,
        //         "message" => "Device successfully enrolled",
        //         "data" => [
        //             "uuid" => $device->device_uuid,
        //             "token" => $user->createToken('auth_token',['*'],now()->addMonths(3))->plainTextToken
        //         ]
        //         ],201);
        // }


        // 1. Validate everything you need (including open_token!)
        $data = $request->validate([
            "code"       => "required|size:6",
            "link_token" => "required|email",
            "open_token" => "required|string" // The public key from Android
        ]);

        // 2. Use first() instead of firstOrFail to prevent HTML 404 crashes
        $user = User::where('email', $data["link_token"])
            ->where("is_active", true)
            ->first();

        if (!$user) {
            return response()->json([
                "success" => false,
                "message" => "Account not found or not yet activated.",
                "data"    => null
            ], 404);
        }

        // 3. OTP Validation
        $otpStatus = (new Otp())->validate($user->email, $data["code"]);

        if ($otpStatus->status) {
            

                // Create the NEW device record for this login session
                $device = Device::updateOrCreate(
                    ['user_id' => $user->id, 'public_key' => $data["open_token"]],
                    ['device_uuid' => Str::uuid()->toString(), 'is_active' => true]
                );

                // Issue a long-lived token (3 months as per your code)
                $token = $user->createToken('auth_token', ['*'], now()->addMonths(3))->plainTextToken;

                return response()->json([
                    "success" => true,
                    "message" => "Device successfully enrolled",
                    "data" => [
                        "uuid"  => $device->device_uuid,
                        "token" => $token
                    ]
                ], 201);
        }

        return response()->json([
            "success" => false,
            "message" => "The verification code is invalid or expired.",
            "data"    => null
        ], 401);
    }

    public function destroy(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    }
}
