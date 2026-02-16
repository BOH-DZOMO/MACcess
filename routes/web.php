<?php

use App\Http\Controllers\AdhocRoomController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\OfficialRoomController;
use App\Mail\EmailActivationOtp;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get("/email",function(){
    Mail::to('bobsbf4@gmail.com')->queue(new EmailActivationOtp("boh dzomo","success"));
});

Route::get("/test1",function(){
    return view('test');
});
Route::get("/test2",function(){
    return view('or1');
});
Route::get("/test3",function(){
    return view('or2');
});
Route::get("/test4",function(){
    return view('or3');
});
Route::get("/report",function(){
    return view('report');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});
// ->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('rooms')->name('rooms.')->group(function () {
    
    // Official
    Route::get('/official', [OfficialRoomController::class, "index"])->name('official.index');
    Route::get('/official/create', [OfficialRoomController::class, "create"])->name('official.create');
    Route::post('/official', [OfficialRoomController::class, "store"])->name('official.store');

    // Adhoc
    Route::get('/adhoc', [AdhocRoomController::class, "index"])->name('adhoc.index');
    Route::get('/adhoc/create', [AdhocRoomController::class, "create"])->name('adhoc.create');
    Route::post('/adhoc', [AdhocRoomController::class, "store"])->name('adhoc.store');
    
});

require __DIR__."/auth.php";
