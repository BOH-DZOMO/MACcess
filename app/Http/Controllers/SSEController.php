<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpFoundation\StreamedResponse;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Ichtrojan\Otp\Otp;
use Illuminate\Support\Facades\Log;

class SSEController extends Controller
{
    // public function stream(Request $request)
    // {
    //     // Increase or disable timeout for SSE
    //     set_time_limit(0);

    //     $response = new StreamedResponse(function () use ($request) {
    //         $user = $request->user();
    //         $userId = $user ? $user->id : session()->getId();
    //         $otp = new Otp();
    //         // In SSE loop
    //         Log::info("SSE checking ID: " . $userId);
    //         // Track last generated times so we don't spam
    //         $lastQrGeneration = Carbon::now()->subMinutes(10); // Force initial generation
    //         $qrRefreshSeconds = 30;

    //         while (true) {
    //             // If client closes browser tab/connection, break loop
    //             if (connection_aborted()) break;

    //             /* 
    //              * --- 1. CONTEXTUAL: QR Code Generation ---
    //              * Web controllers set this key when a user views an invite page
    //              */
    //             $contextKey = "user_viewing_invite_{$userId}";
    //             $roomId = Cache::get($contextKey);

    //             // Log::info("SSE roomId: " . $roomId);

    //             if ($roomId) {
    //                 $now = Carbon::now();
                    
    //                 if ($now->diffInSeconds($lastQrGeneration) >= $qrRefreshSeconds) {
    //                     Log::info("SSE generating QR for room: " . "true");
    //                     try {
    //                         // Generate an OTP token that is valid for our refresh period
    //                         // Using the user_id and room_id as identifier to uniquely identify this session
    //                         $identifier = "qr_auth_{$userId}_{$roomId}";
    //                         $otpObj = $otp->generate($identifier, 'alphanumeric', 10, ceil($qrRefreshSeconds / 60));
    //                         $token = $otpObj->token;

    //                         // Include room ID in QR for frontend scanning context
    //                         $qrPayload = json_encode([
    //                             'token' => $token,
    //                             'room_id' => $roomId,
    //                             'timestamp' => $now->timestamp
    //                         ]);

    //                         $qr = base64_encode(QrCode::size(200)->generate($qrPayload));
                            
    //                         echo "event: ping\n";
    //                         echo "data: " . $qr . "\n\n";

    //                         $lastQrGeneration = $now;
    //                     } catch (\Exception $e) {
    //                         // Log error, don't crash stream
    //                         logger()->error("QR Generation failed in SSE: " . $e->getMessage());
    //                     }
    //                 }

    //                 // Send countdown tick every second
    //                 $secondsRemaining = $qrRefreshSeconds - $now->diffInSeconds($lastQrGeneration);
    //                 echo "event: timer_tick\n";
    //                 echo "data: " . json_encode(['seconds' => max(0, $secondsRemaining)]) . "\n\n";
    //             }

    //             /* 
    //              * --- 2. GLOBAL: Notifications ---
    //              * Check for an item in a list acting as a queue for this user
    //              */
    //             $notificationKey = "user_notifications_{$userId}";
    //             $notificationJson = Cache::pull($notificationKey);

    //             if ($notificationJson) {
    //                 echo "event: notification\n";
    //                 echo "data: " . $notificationJson . "\n\n";
    //             }

    //             /* 
    //              * --- 3. HEARTBEAT ---
    //              * Keep connection alive
    //              */
    //             echo "event: heartbeat\n";
    //             echo "data: {\"status\":\"alive\"}\n\n";

    //             ob_flush();
    //             flush();
                
    //             // Throttle iteration (1 second loop)
    //             sleep(1);
    //         }
    //     });

    //     // Mandatory SSE Headers
    //     $response->headers->set('Content-Type', 'text/event-stream');
    //     $response->headers->set('X-Accel-Buffering', 'no');
    //     $response->headers->set('Cache-Control', 'no-cache');

    //     return $response;
    // }
    public function stream(Request $request)
{
    set_time_limit(0);

    return new StreamedResponse(function () use ($request) {
        $user = $request->user();
        $userId = $user ? $user->id : session()->getId();
        $otp = new Otp();

        // 1. CRITICAL: Clear all existing buffers so data flows immediately
        while (ob_get_level()) ob_end_flush();

        // 2. Use a timestamp for more reliable loop logic
        $lastQrTimestamp = 0; 
        $qrRefreshSeconds = 30;

        while (true) {
            if (connection_aborted()) break;

            $contextKey = "user_viewing_invite_{$userId}";
            $roomId = Cache::get($contextKey);

            if ($roomId) {
                $now = time();
                
                // 3. Simple math check for refresh
                if (($now - $lastQrTimestamp) >= $qrRefreshSeconds) {
                    try {
                        $identifier = "qr_auth_{$userId}_{$roomId}";
                        $otpObj = $otp->generate($identifier, 'alpha_numeric', 10, ceil($qrRefreshSeconds / 60));
                        
                        $qrPayload = json_encode([
                            'token' => $otpObj->token,
                            'room_id' => $roomId,
                            'timestamp' => $now
                        ]);

                        $qr = base64_encode(QrCode::size(200)->generate($qrPayload));
                        
                        echo "event: ping\n";
                        echo "data: {$qr}\n\n";

                        $lastQrTimestamp = $now;
                    } catch (\Exception $e) {
                        logger()->error("QR Generation failed: " . $e->getMessage());
                    }
                }

                // Countdown logic
                $secondsRemaining = $qrRefreshSeconds - ($now - $lastQrTimestamp);
                echo "event: timer_tick\n";
                echo "data: " . json_encode(['seconds' => max(0, $secondsRemaining)]) . "\n\n";
            }

            // Notification check
            $notificationKey = "user_notifications_{$userId}";
            if ($notificationJson = Cache::pull($notificationKey)) {
                echo "event: notification\n";
                echo "data: {$notificationJson}\n\n";
            }

            // Heartbeat
            echo "event: heartbeat\n";
            echo "data: {\"status\":\"alive\"}\n\n";

            // 4. Force push to browser
            flush();
            
            sleep(1);
        }
    }, 200, [
        'Content-Type' => 'text/event-stream',
        'Cache-Control' => 'no-cache',
        'Connection' => 'keep-alive', // Required for some proxies
        'X-Accel-Buffering' => 'no',   // Required for Nginx
    ]);
}

}
