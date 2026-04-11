<?php

namespace App\Http\Controllers;
use App\Events\SendQrCode;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class QRCodeController extends Controller
{
    public function index(){
        $token = $this->generateToken();
        $qr = base64_encode(QrCode::size(200)->generate($token));
        // event(new SendQrCode("h4hriuhiuhi3",$qr));
        return view('room.official_invite', compact('qr'));
}

public function generateToken(){
    $token = Str::random(10);
    return $token;
}
}