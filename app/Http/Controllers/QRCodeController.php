<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function index(){
        return QrCode::size(200)->generate("https://maccess.test/join_room?token=123456");
}
}