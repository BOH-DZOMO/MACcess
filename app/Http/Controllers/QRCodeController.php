<?php

namespace App\Http\Controllers;

use App\Events\SendQrCode;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;

class QRCodeController extends Controller
{
    public function index()
    {
        // $token = $this->generateToken();
        // $qr = base64_encode(QrCode::size(200)->generate($token));
        // // event(new SendQrCode("h4hriuhiuhi3",$qr));
        // return view('room.official_invite', compact('qr'));

    }

    public function stream()
    {
        $response = new StreamedResponse(function () {
           while(true){
            $qr = base64_encode(QrCode::size(200)->generate(Str::random(10)));
            echo "event: ping\n";
            echo "data: ". json_encode('hello') . "\n\n";
            echo "data: " . $qr . "\n\n";
            ob_flush();
            flush();
            sleep(5);
           }
        });
        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('X-Accel-Buffering', 'no');
        $response->headers->set('Cache-Control', 'no-cache');
        return $response;
        // $response = new StreamedResponse(function () {
        //     $counter = rand(1, 10);

        //     while (true) {
        //         // Check if client disconnected
        //         if (connection_aborted()) break;

        //         $curDate = date("Y-m-d H:i:s");

        //         // 1. Sending a named event with JSON
        //         echo "event: ping\n";
        //         echo 'data: {"time": "' . $curDate . '"}';
        //         echo "\n\n";

        //         // 2. Sending a plain text message
        //         $counter--;
        //         if (!$counter) {
        //             echo "data: This is a message at time {$curDate}\n\n";
        //             $counter = rand(1, 10);
        //         }

        //         ob_flush();
        //         flush();
        //         sleep(1);
        //     }
        // });

        // // Set the headers on the response object
        // $response->headers->set('Content-Type', 'text/event-stream');
        // $response->headers->set('X-Accel-Buffering', 'no');
        // $response->headers->set('Cache-Control', 'no-cache');

        // return $response;
    }

    public function sse_page()
    {
        return view('sse');
    }

    public function generateToken()
    {
        $token = Str::random(10);
        return $token;
    }
}
