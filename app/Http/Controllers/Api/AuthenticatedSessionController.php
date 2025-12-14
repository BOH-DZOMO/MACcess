<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthenticatedSessionRequest;
use App\Models\Device;
use App\Models\User;
use Ichtrojan\Otp\Models\Otp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthenticatedSessionController extends Controller
{

    
    public function store(AuthenticatedSessionRequest $request)
    {   
        $request->authenticate(); 
    }

    public function verify(Request $request)
    {
        
        $data = $request->validate(["code" => "required|size:6","link_token" => "required|email"]);
        $user = User::with('devices:id,devices.user_id,is_active,device_uuid')->where('email',$data["link_token"])->where("is_active",true)->firstorFail();
        if (!$user) {
            return response()->json([
                "success" => false,
                "message" => "Invalid email or verification code."
            ], 404);
        }
        if ((new Otp())->validate($user->email,$data["code"])->status) {
            $device = Device::create([
            "user_id" => $user->id,
            "device_uuid" => Str::uuid()->toString(),
            "public_key" => $data["open_token"]
        ]);
            $user->device->update(["is_active" => true]);
            return response()->json([
                "success" => true,
                "message" => "Device successfully enrolled",
                "data" => [
                    "uuid" => $device->device_uuid,
                    "token" => $user->createToken('auth_token',['*'],now()->addMonths(3))->plainTextToken
                ]
                ],201);
        }
    }

    public function destroy(Request $request){
        $request->user()->currentAccessToken()->delete();
    }

}
