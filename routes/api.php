<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiAuthController;

Route::post('/login', [ApiAuthController::class, 'login']);

Route::post('/register', [ApiAuthController::class, 'register']);

Route::middleware('auth:sanctum')->post('/logout', [ApiAuthController::class, 'logout']);