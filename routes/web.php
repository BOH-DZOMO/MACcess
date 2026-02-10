<?php

use App\Http\Controllers\AdhocRoomController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\OfficialRoomController;
use App\Mail\emailActivationOtp;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get("email",function(){
    Mail::to('bobsbf4@gmail.com')->queue(new emailActivationOtp("boh dzomo","success"));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// /rooms
Route::get('/rooms/Official/create',[OfficialRoomController::class,"create"]);
Route::post('/rooms/Official/', [OfficialRoomController::class, "store"]);

Route::get('/rooms/Adhoc/create',[AdhocRoomController::class,"create"]);
Route::post('/rooms/Adhoc/', [AdhocRoomController::class, "store"]);

require __DIR__."/auth.php";
