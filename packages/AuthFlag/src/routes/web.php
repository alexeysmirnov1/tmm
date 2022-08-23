<?php

use Flagstudio\AuthFlag\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')
    ->get(config('auth-flag.url'), [LoginController::class, 'page'])
    ->name('flag.auth.form');

Route::middleware('guest')
    ->post(config('auth-flag.url'), [LoginController::class, 'login'])
    ->name('flag.auth.login');
