<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ShowRoomsCotroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
}) -> name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/rooms', ShowRoomsCotroller::class);
Route::resource('bookings', BookingController::class);
