<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class AttendanceController extends Controller
{
  
    public function registerStructured(Request $request)
    {
        $data = $request->validate([
            "payload"=> "required|array",
            "payload.device_uuid" => "required|string", //any device identifier
            "payload.time" => "required|string", //timestamp
            "payload.time_window" => "required",
            "payload.wifi_bssid" => "Required",
            "payload.location" => "required",
            "signature" => "required"
        ]);

        //verify if the package is active
        
    }
     public function registerUnstructured(Request $request)
    {
        $data = $request->validate([
            "payload"=> "required|array",
            "payload.device_uuid" => "required|string", //any device identifier
            "payload.time" => "required|string", //timestamp
            "payload.wifi_bssid" => "Required",
            "payload.location" => "required",
            
            "signature" => "required",
            "data" => "sometimes|array"

    ]);    
    }   
}
