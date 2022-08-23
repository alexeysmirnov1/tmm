<?php

use Flagstudio\AuthFlag\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get(config('auth-flag.url'), [LoginController::class, 'page'])
    ->name('flag.auth.form')
    ->middleware('guest');

Route::post(config('auth-flag.url'), [LoginController::class, 'login'])
    ->name('flag.auth.login')
    ->middleware('guest');
