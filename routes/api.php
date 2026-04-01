<?php

use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\AuthenticatedSessionController;
//test
use App\Http\Controllers\AdhocRoomController;
use App\Http\Controllers\OfficialRoomController;
//
use App\Http\Controllers\Api\RegisteredUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function () {
    Route::post("/register", [RegisteredUserController::class, "store"]);
    Route::post("/login", [AuthenticatedSessionController::class, "store"]);
    Route::post("/activate_account", [RegisteredUserController::class, "activateAccount"]);
    Route::post("/resend_activation_Otp", [RegisteredUserController::class, "resendActivationOtp"])->middleware('throttle:3,1');;
});
Route::middleware('auth:sanctum')->group(function () {

    Route::prefix("Attendance/Official")->group(function () {
        Route::post("/{uuid}", [AttendanceController::class, "registerStructured"]);
    });

    Route::prefix("Attendance/Adhoc")->group(function () {
        Route::post("/{uuid}", [AttendanceController::class, "registerUnstructured"]);
    });
    
    Route::prefix('rooms')->group(function () {

    // Official
    Route::get('/official', [OfficialRoomController::class, "index"]);
    Route::get('/official/{uuid}', [OfficialRoomController::class, "show"]);

    // Adhoc
    Route::get('/adhoc', [AdhocRoomController::class, "index"]);
    // Route::get('/adhoc/{uuid}', [AdhocRoomController::class, "show"])->name('adhoc.show');

});

    Route::post("/logout", [AuthenticatedSessionController::class, "destroy"]);
});


// php artisan route:list --path=rooms