<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('categories', [CategoryController::class, 'index']);

Route::get('categories/{id}', [CategoryController::class, 'show']);

Route::post('categories', [CategoryController::class, 'store']);

Route::put('categories/{id}', [CategoryController::class, 'update']);

Route::delete('categories/{id}', [CategoryController::class, 'delete']);

Route::get('products', [ProductController::class, 'index']);

Route::get('products/{id}', [ProductController::class, 'show']);

Route::post('products', [ProductController::class, 'store']);

Route::put('products/{id}', [ProductController::class, 'update']);

Route::delete('products/{id}', [ProductController::class, 'delete']);
