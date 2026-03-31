<?php

use App\Http\Controllers\AdhocRoomController;
use App\Http\Controllers\OfficialRoomController;
use App\Http\Controllers\ReportController;
use App\Mail\EmailActivationOtp;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/testing', function () {
//     return view('testing');
// });

// Route::get("/email",function(){
//     Mail::to('bobsbf4@gmail.com')->queue(new EmailActivationOtp("boh dzomo","success"));
// });

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
Route::get("/test5",function(){
    return view('of');
});
Route::get("/test6",function(){
    return view('ad');
});
Route::get("/report",[ReportController::class,"index"])->name("report.index");

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
// ->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('rooms')->name('rooms.')->group(function () {
    
    // Official
    Route::get('/official', [OfficialRoomController::class, "index"])->name('official.index');
    Route::get('/official/create', [OfficialRoomController::class, "create"])->name('official.create');
    Route::post('/official/session', [OfficialRoomController::class, "storeSession"])->name('official.store-session');
    Route::post('/official', [OfficialRoomController::class, "store"])->name('official.store');
    Route::get('/official/create/review', [OfficialRoomController::class, "review"])->name('official.create.review');
    Route::get('/official/{uuid}', [OfficialRoomController::class, "show"])->name('official.show');
    Route::delete('/official/{room:room_uuid}', [OfficialRoomController::class, "destroy"])->name('official.destroy');
    Route::get('/official/{room:room_uuid}/edit', [OfficialRoomController::class, "edit"])->name('official.edit');
    Route::put('/official/{room:room_uuid}', [OfficialRoomController::class, "update"])->name('official.update');

    // Adhoc
    Route::get('/adhoc', [AdhocRoomController::class, "index"])->name('adhoc.index');
    Route::get('/adhoc/create', [AdhocRoomController::class, "create"])->name('adhoc.create');
    Route::post('/adhoc/session', [AdhocRoomController::class, "storeSession"])->name('adhoc.store-session');
    Route::post('/adhoc', [AdhocRoomController::class, "store"])->name('adhoc.store');
    Route::get('/adhoc/create/review', [AdhocRoomController::class, "review"])->name('adhoc.create.review');
    
});



require __DIR__."/auth.php";
