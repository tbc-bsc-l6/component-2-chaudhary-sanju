<?php

use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::group(['prefix' => 'account'], function () {

    //Guest Middleware
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::get('register', [LoginController::class, 'register'])->name('account.register');
        Route::post('process-register', [LoginController::class, 'processRegister'])->name('account.processRegister');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
    });


    //Authenticated Middleware
    Route::group(['middleware' => 'auth'], function () {
        Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('account.dashboard');
    });
});

Route::group(['prefix' => 'admin'], function () {

    //Guest Middleware
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });


    //Authenticated Middleware
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');


        // Route for category
        Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

        // Route for author
        Route::get('/author', [AuthorController::class, 'index'])->name('author.index');
        Route::get('/author/create', [AuthorController::class, 'create'])->name('author.create');
        Route::post('/author/store', [AuthorController::class, 'store'])->name('author.store');
        Route::get('/author/{author}/edit', [AuthorController::class, 'edit'])->name('author.edit');
        Route::put('/author/{author}', [AuthorController::class, 'update'])->name('author.update');
        Route::delete('/author/{author}', [AuthorController::class, 'destroy'])->name('author.destroy');

        // Route for product
        Route::get('/product', [ProductController::class, 'index'])->name('product.index');
        Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

        // Route for User
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

        // Route for profile update
        Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});
