<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')
    ->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class])->name('dashboard');

        Route::any('', function () {
            dd(213);
        });
    });

Route::middleware('guest')
    ->group(function () {
        Route::permanentRedirect('(.*)', '/login');
    });
