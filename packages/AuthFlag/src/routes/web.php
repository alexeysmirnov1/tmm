<?php

use Flagstudio\AuthFlag\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get(config('auth-flag.url'), [LoginController::class, 'index'])
    ->name('flag.auth.form');

Route::post(config('auth-flag.url'), [LoginController::class, 'store'])
    ->name('flag.auth.login');