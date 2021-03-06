<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Driver\DriverController;
use App\Http\Controllers\Driver\DriverUserController;
use App\Http\Controllers\Passenger\BookingController;
use App\Http\Controllers\Passenger\PassengerController;
use App\Http\Controllers\Payments\PaymentsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});

// Email Verification Routes

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard.dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('driver', DriverController::class);
    Route::resource('driver-user', DriverUserController::class);
    Route::resource('passenger', PassengerController::class);
    Route::resource('booking', BookingController::class);
    Route::resource('payment', PaymentsController::class);
});
