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

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\LiabilityController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SourceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')
    ->group(function () {
        Route::get('/dashboard', DashboardController::class)
            ->name('dashboard');

        Route::get('/assets/create/{date}')
            ->name('assets.create');
        Route::resource('assets', AssetsController::class);

        Route::resource('liabilities', LiabilityController::class);

        Route::resource('clients', ClientController::class);

        Route::resource('promotions', PromotionController::class);

        Route::resource('category', CategoryController::class);

        Route::resource('sources', SourceController::class);

        Route::permanentRedirect('{any}', '/dashboard')
            ->where('any', '.*');
    });
