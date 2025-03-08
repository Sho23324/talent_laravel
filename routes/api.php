<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\PermissionController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProductImageController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

//auth
Route::post('auth/login', [AuthController::class, 'login']);

Route::group(['middleware'=>'auth:api'], function() {
//categories
    Route::get('categories', [CategoryController::class, 'index']);

    Route::get('categories/{id}', [CategoryController::class, 'show']);

    Route::post('categories', [CategoryController::class, 'store']);

    Route::put('categories/{id}', [CategoryController::class, 'update']);

    Route::delete('categories/{id}', [CategoryController::class, 'delete']);

//products
    Route::get('products', [ProductController::class, 'index']);

    Route::get('products/{id}', [ProductController::class, 'show']);

    Route::post('products', [ProductController::class, 'store']);

    Route::put('products/{id}', [ProductController::class, 'update']);

    Route::delete('products/{id}', [ProductController::class, 'delete']);

//users
    Route::apiResource('users', UserController::class);

    Route::post('status', [UserController::class, 'status']);

//roles
    Route::apiResource('roles', RoleController::class);

//permissions
    Route::apiResource('permissions', PermissionController::class);


//produdct image
    Route::apiResource('productImages', ProductImageController::class);

});

