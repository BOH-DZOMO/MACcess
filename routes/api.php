<?php

use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AuthenticatedSessionController;
use App\Http\Controllers\Api\DeviceController;
use App\Http\Controllers\Api\RegisteredUserController;
use App\Http\Controllers\Api\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function () {
    Route::post("/register", [RegisteredUserController::class, "store"]);
    Route::post("/login", [AuthenticatedSessionController::class, "store"]);
    Route::post("/activate_account", [RegisteredUserController::class, "activateAccount"]);
    Route::post("/resend_activation_Otp", [RegisteredUserController::class, "resendActivationOtp"]);
});
Route::middleware('auth:sanctum')->group(function () {

    // Route::post("/enroll_device", [DeviceController::class, "enrollDevice"]);
    // Route::post("/confirm_account", [AuthController::class, "confirmAccount"]);
    // Route::get("/verify_account", [AuthController::class, "verifyAccount"]);
    //
    Route::prefix("/Room/Official")->group(function () {
        Route::post("/create", [RoomController::class, "store_structured"]);
        Route::get("/", [RoomController::class, "getOfficialRooms"]);
        Route::post("/enroll", [RoomController::class, "enrollOfficialRoom"]);
    });
    // Route::post("/Room/Official/create", [RoomController::class, "store_structured"]);
    // Route::get("/Room/Official",[RoomController::class, "getOfficialRooms"]);
    // Route::post("Room/Official/enroll", [RoomController::class, "enrollOfficialRoom"]);

    Route::prefix("/room/Adhoc/")->group(function () {
        Route::post("/create", [RoomController::class, "store_unstructured"]);
        Route::get("/", [RoomController::class, "getAdhocRooms"]);
    });
    // Route::post("/Room/Adhoc/create", [RoomController::class, "store_unstructured"]);
    // Route::get("/Room/Adhoc",[RoomController::class, "getAdhocRooms"]);

    //enroll to an official room
    //to find active rooms -- need to add an active or time bound feature to the adhoc events so that they are not active all the time
    //mark attendance

    Route::prefix("Attendance/Official")->group(function () {
        Route::post("/{uuid}", [AttendanceController::class, "registerStructured"]);
    });
    // Route::post("Attendance/Official/{uuid}", [AttendanceController::class, "registerStructured"]);

    Route::prefix("Attendance/Adhoc")->group(function () {
        Route::post("/{uuid}", [AttendanceController::class, "registerUnstructured"]);
    });
    // Route::post("Attendance/Adhoc/{uuid}", [AttendanceController::class, "registerUnstructured"]);

    Route::post("/logout", [AuthenticatedSessionController::class, "destroy"]);
});
