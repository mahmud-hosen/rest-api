<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;




    Route::resource('product', ProductController::class);

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);



    // sanctum

    // Route::middleware('auth:api')->group(function () {
    //     // Your protected routes here
    //     Route::get('/product', [ProductController::class, 'index']);

    // });

    Route::get('/product', [ProductController::class, 'index'])->middleware('custom.auth');

    


