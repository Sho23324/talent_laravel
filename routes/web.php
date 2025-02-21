<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//static
Route::get('/blogs', function() {
    return "hello";
});

//dynamic
Route::get('/blogs/{id}', function($id) {
    return "hello, This is blog detail - $id";
})->name("blogDetail.tpp");

//naming
Route::get('/dashboard', function() {
    return "Welcome to Tpp";
})->name("dashboard.tpp");

//redirect
Route::get('/welcome-tpp', function() {
    return redirect()->route("dashboard.tpp");
});

//group route
Route::prefix("/dashboard")->group(function() {
    Route::get("/admin", function() {
        return "This is admin dashboard";
    });

    Route::get("/user", function() {
        return "This is user dashboard";
    })->name("dashboard.user");

    Route::get("/student", function() {
        return redirect()->route("dashboard.user");
    });
});

// Route::get("/categories", function() {
//     return view("category.index");
// });


Route::get("/articles", [ArticleController::class, "index"]);

Route::get("/categories", [CategoryController::class, "index"])->name("category.list");

Route::get("/categories/{id}", [CategoryController::class, "show"]) -> name("category.show");

Route::get("/products", [ProductController::class, "index"])->name("product.index");

Route::get("/products/{id}", [ProductController::class, "detail"])->name("product.detail");
