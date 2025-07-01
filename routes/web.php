<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
Route::get('/', [AdminController::class,'home']);
 

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',         
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


Route::middleware('auth','admin')->group(function (){
    Route::get('home', [AdminController::class,'index'])->name('home');
    
    Route::get('/create_room', [AdminController::class,'create_room']);
    
    Route::post('/add_room', [AdminController::class,'add_room']);
    
    Route::get('/view_room', [AdminController::class,'view_room']);
    Route::get('/delete_room/{id}', [AdminController::class,'delete_room']);
    Route::get('/edit_room/{id}', [AdminController::class,'edit_room']);
    Route::post('/edit_room/{id}', [AdminController::class,'update_room']);
    Route::get('/bookings', [AdminController::class,'bookings']);
    Route::get('/delete_booking/{id}', [AdminController::class,'delete_booking']);
    Route::get('/approve_booking/{id}', [AdminController::class,'approve_booking']);
    Route::get('/reject_booking/{id}', [AdminController::class,'reject_booking']);
    Route::get('/gallaries', [AdminController::class,'gallaries']);
    Route::post('/upload_gallary', [AdminController::class,'upload_gallary']);
    Route::get('/delete_gallary/{id}', [AdminController::class,'delete_gallary']);
    
    Route::get('/all_messages', [AdminController::class,'all_messages']);
    Route::get('/send_mail/{id}', [AdminController::class,'send_mail']);
    Route::post('/mail/{id}', [AdminController::class,'mail']);

});

Route::get('/room_details/{id}', [HomeController::class,'room_details']);

Route::post('/room_booking/{id}', [HomeController::class,'room_booking']);
Route::post('/contact', [HomeController::class,'contact']);
Route::get('/hotel_room', [HomeController::class,'hotel_room']);
Route::get('/hotel_gallary', [HomeController::class,'hotel_gallary']);
Route::get('/contact_us', [HomeController::class,'contact_us']);


