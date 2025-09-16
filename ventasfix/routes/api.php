<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\Api\AuthApiController;

// Rutas de autenticación JWT
Route::post('login', [AuthApiController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    Route::get('me', [AuthApiController::class, 'me']);
    Route::post('logout', [AuthApiController::class, 'logout']);
    Route::post('refresh', [AuthApiController::class, 'refresh']);

    // Usuarios API
    Route::apiResource('users', UserController::class);
    // Productos API
    Route::apiResource('productos', ProductoController::class);
    // Clientes API
    Route::apiResource('clientes', ClienteController::class);
});
