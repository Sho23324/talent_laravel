<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/blogs', function() {
    return "hello";
});

//dynamic
Route::get('/blogs/{id}', function($id) {
    return "hello, This is blog detail - $id";
})->name("blogDetail.tpp");

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

//articles
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.list');

Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');

Route::post('/articles/store', [ArticleController::class, 'store'])->name('articles.store');

//products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

Route::post('/products/save', [ProductController::class, 'store'])->name('products.store');

Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');

Route::post('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');

Route::post('/products/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');

Route::get('/products/{id}', [ProductController::class, 'detail'])->name('products.detail');

//categories
Route::get('/categories', [CategoryController::class, 'index'])->name('category.list');

Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');

Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

Route::get('/categories/{id}', [CategoryController::class, "show"]) -> name("category.show");

Route::post('/categories/{id}', [CategoryController::class, 'delete'])->name('category.delete');

Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');

Route::post('categories/{id}/update', [CategoryController::class, 'update'])->name('category.update');

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/users', UserController::class);

//Role
Route::resource('/roles',RoleController::class);

//Permission
Route::resource('/permissions', PermissionController::class);


Route::post('/status/{id}', [ProductController::class, 'status'])->name('products.status');

Route::post('/storeImg/{id}', [ProductController::class, 'imgForm'])->name('products.imgForm');

Route::post('/storeImgAction/{id}', [ProductController::class, 'storeImg'])->name('products.storeImg');

Route::post('/deleteImg/{id}', [ProductController::class, 'deleteImg'])->name('products.deleteImg');
// Route::resource('/productImages', ProductImageController::class);
