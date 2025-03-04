<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiAuthController;

Route::post('/login', [ApiAuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [ApiAuthController::class, 'logout']);