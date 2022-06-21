<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\LoanController;

Route::group([
    'middleware' => 'jwt',
], function () {
    Route::post('login', [AuthController::class, 'login'])->withoutMiddleware('jwt');
    Route::post('signup', [UserController::class, 'signup'])->withoutMiddleware('jwt');
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('request', [RequestController::class, 'requestLaptop']);
    Route::get('cancel/request/{requestId}', [RequestController::class, 'cancelRequest']);
    Route::get('laptops', [LaptopController::class, 'getLaptops']);
    Route::get('checkinLaptop/{requestId}/{userId}/{laptopId}', [LoanController::class, 'checkinLaptop']);
    Route::get('me', [AuthController::class, 'me']);
});
