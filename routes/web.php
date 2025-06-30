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

Route::get('home', [AdminController::class,'index'])->name('home');

Route::get('/create_room', [AdminController::class,'create_room']);

Route::post('/add_room', [AdminController::class,'add_room']);

Route::get('/view_room', [AdminController::class,'view_room']);
Route::get('/delete_room/{id}', [AdminController::class,'delete_room']);
Route::get('/edit_room/{id}', [AdminController::class,'edit_room']);
Route::post('/edit_room/{id}', [AdminController::class,'update_room']);
Route::get('/room_details/{id}', [HomeController::class,'room_details']);




