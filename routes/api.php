<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UrlController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/shorten', [UrlController::class, 'shorten']);
        Route::get('/url', [UrlController::class, 'index']);
        Route::get('/url/{shorten}', [UrlController::class, 'redirect']);
    });
});

Route::prefix('v2')->group(function () {

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/shorten', [UrlController::class, 'shorten']);
        Route::get('/url', [UrlController::class, 'index']);
        Route::get('/url/{shorten}', [UrlController::class, 'redirect']);
        Route::get('/url/view/{id}', [UrlController::class, 'show']);
    });
});
