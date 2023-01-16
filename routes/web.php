<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\EmailVerificationController;

use App\Http\Livewire\User\DashboardIndex; 

use App\Http\Livewire\User\Order\Index as OrderIndex;
use App\Http\Livewire\User\Order\Create as OrderCreate;
use App\Http\Livewire\User\Order\Show as OrderShow;

use App\Http\Livewire\User\Legalize\Index as LegalizeIndex;
use App\Http\Livewire\User\Legalize\Create as LegalizeCreate;
use App\Http\Livewire\User\Legalize\Show as LegalizeShow;
use App\Http\Livewire\User\Legalize\Edit as LegalizeEdit;

use App\Http\Livewire\User\Profile\Index as ProfileIndex;
use App\Http\Livewire\User\Profile\Create as ProfileCreate;
use App\Http\Livewire\User\Profile\Show as ProfileShow;
use App\Http\Livewire\User\Profile\Edit as ProfileEdit;

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
    Route::get('dashboard', DashboardIndex::class)->name('dashboard.index');

    Route::get('/order', OrderIndex::class)->name('order.index');
    Route::get('/order/create', OrderCreate::class)->name('order.create');
    Route::get('/order/show', OrderShow::class)->name('order.show');
    
    Route::get('/legalize', LegalizeIndex::class)->name('legalize.index');
    Route::get('/legalize/create', LegalizeCreate::class)->name('legalize.create');
    Route::get('/legalize/show', LegalizeShow::class)->name('legalize.show');
    Route::get('/legalize/edit', LegalizeEdit::class)->name('legalize.edit');

    Route::get('/profile', ProfileIndex::class)->name('profile.index');
    Route::get('/profile/create', ProfileCreate::class)->name('profile.create');
    Route::get('/profile/edit', ProfileEdit::class)->name('profile.edit');
});

