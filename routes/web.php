<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [BookingController::class, 'index']);
Route::get('/theatre/{id}', [BookingController::class, 'getTheatres']);
Route::get('/show/{id}', [BookingController::class, 'getShows']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/user/dashboard', [BookingController::class, 'dashboard'])->name('dashboard');
    Route::get('/cancel/booking/{id}', [BookingController::class, 'cancelBooking'])->name('cancel-booking');
    Route::post('/cinema/booking', [BookingController::class, 'cinemaBooking'])->name('booking');
});
