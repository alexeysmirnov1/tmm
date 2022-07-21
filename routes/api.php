<?php

use App\Http\Controllers\API\V1\AuthorBookController;
use App\Http\Controllers\API\V1\BookAuthorController;
use App\Http\Controllers\API\V1\CategoryController;
use App\Http\Controllers\API\V1\CategoryProductController;
use App\Http\Controllers\API\V1\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')
    ->name('v1')
    ->group(function () {
        Route::apiResource('products', ProductController::class);

        Route::apiResource('categories', CategoryController::class);

        Route::get('/categories/{category}/products', [CategoryProductController::class, 'index']);
        Route::post('/categories/{category}/products', [CategoryProductController::class, 'store']);

        Route::get('/books/{book}/authors', [BookAuthorController::class, 'index']);
        Route::post('/books/{book}/authors', [BookAuthorController::class, 'store']);

        Route::get('/authors/{author}/books', [AuthorBookController::class, 'index']);
        Route::post('/authors/{author}/books', [AuthorBookController::class, 'store']);
    });
