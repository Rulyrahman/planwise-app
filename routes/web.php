<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages/homepage');
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('pages/dashboard');
})->name('dashboard');
