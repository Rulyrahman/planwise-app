<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiAuthController;
use App\Http\Controllers\API\UserApiController;

Route::post('/login', [ApiAuthController::class, 'login']);

Route::post('/register', [ApiAuthController::class, 'register']);

Route::middleware('auth:sanctum')->post('/logout', [ApiAuthController::class, 'logout']);

Route::apiResource('users', UserApiController::class );