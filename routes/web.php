<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Auth\Passwords\Email;

use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Controllers\LegalizeController;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\EmailVerificationController;
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

Route::get('/optimize', function () {
            Artisan::call('optimize');
            dd(Artisan::output());
        });

Route::view('/', 'welcome')->name('home');
Route::get('password/reset', Email::class)->name('password.request');
Route::get('password/reset/{token}', Reset::class)->name('password.reset');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)->middleware('throttle:6,1')->name('verification.notice');
    Route::get('password/confirm', Confirm::class)->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)->middleware('signed')->name('verification.verify');
    Route::post('logout', LogoutController::class)->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::resource('/dashboard', DashboardController::class)->only('index');
    Route::resource('/profile', ProfileController::class)->only('index','store','update','destroy');
    Route::resource('/legalize', LegalizeController::class)->only('index','create','store','show','edit','update','destroy');
    Route::resource('/order', OrderController::class)->only('index','create','store','show','edit','update');
    Route::resource('/payment', PaymentController::class)->only('store','update');
});

