<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\PurchaseReportController;

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

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/catalog', [CategoryController::class, 'getCatalog']);

Route::get('/reports/purchases/{format}', [PurchaseReportController::class, 'generateReport']);

Route::get('/product/{id}', [ProductController::class, 'show']);

Route::put('/products/{product}/move-to-category/{category}', [ProductController::class, 'moveToCategory']);

Route::put('/category/{category}/change-category/{parent}', [CategoryController::class, 'changeParentCategory']);

Route::get('/products/sort', [ProductController::class, 'sortProducts']);