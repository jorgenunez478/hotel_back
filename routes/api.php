<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AccommodationController::class)->group(function(){
    Route::get('accommodation', 'index');
    Route::get('accommodation/{id}', 'show');
    Route::post('accommodation', 'store');
    Route::put('accommodation/{id}', 'update');
    Route::delete('accommodation/{id}', 'destroy');
});

Route::controller(CityController::class)->group(function(){
    Route::get('city', 'index');
    Route::get('city/{id}', 'show');
    Route::post('city', 'store');
    Route::put('city/{id}', 'update');
    Route::delete('city/{id}', 'destroy');
});

Route::controller(RoomTypeController::class)->group(function(){
    Route::get('roomType', 'index');
    Route::get('roomType/{id}', 'show');
    Route::post('roomType', 'store');
    Route::put('roomType/{id}', 'update');
    Route::delete('roomType/{id}', 'destroy');
});

Route::controller(HotelController::class)->group(function(){
    Route::get('hotel', 'index');
    Route::get('hotel/{id}', 'show');
    Route::post('hotel', 'store');
    Route::put('hotel/{id}', 'update');
    Route::delete('hotel/{id}', 'destroy');
});

Route::controller(RoomController::class)->group(function(){
    Route::get('room', 'index');
    Route::get('room/{id}', 'show');
    Route::post('room', 'store');
    Route::put('room/{id}', 'update');
    Route::delete('room/{id}', 'destroy');
});