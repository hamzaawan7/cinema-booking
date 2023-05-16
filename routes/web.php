<?php

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

/*Route::get('/', function () {
    return view('index');
});*/

Route::get('/', [BookingController::class, 'index']);
Route::get('/theatre/{id}', [BookingController::class, 'getTheatres']);
Route::get('/show/{id}', [BookingController::class, 'getShows']);
Route::post('/cinema/booking', [BookingController::class, 'cinemaBooking'])->name('cinema-booking');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/user/dashboard', [BookingController::class, 'dashboard'])->name('dashboard');
    Route::get('/cancle/booking/{id}', [BookingController::class, 'cancleBooking'])->name('cancle-booking');
});
