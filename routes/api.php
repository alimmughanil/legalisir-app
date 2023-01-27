<?php

use App\Http\Controllers\AddressAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('province',[AddressAPIController::class, 'getProvince'])->name('get.province');
Route::get('address/search',[AddressAPIController::class, 'getAddressByUrban'])->name('search.address');