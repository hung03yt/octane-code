<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'useradmin'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.home');
        Route::get('movie', [AdminController::class, 'movie'])->name('admin.movie');
        Route::get('category', [AdminController::class, 'category'])->name('admin.category');

        Route::prefix('movie')->group(function () {
            Route::get('/add', [AdminController::class, 'movieAdd']);
            Route::post('/add', [AdminController::class, 'movieStore']);
            Route::get('/update/{movie}', [AdminController::class, 'movieShow']);
            Route::post('/update/{movie}', [AdminController::class, 'movieUpdate']);
            Route::delete('/delete/{movie}', [AdminController::class, 'movieDelete']);
        });

        Route::prefix('category')->group(function () {
            Route::get('/add', [AdminController::class, 'categoryAdd']);
            Route::post('/add', [AdminController::class, 'categoryStore']);
            Route::get('/update/{category}', [AdminController::class, 'categoryShow']);
            Route::post('/update/{category}', [AdminController::class, 'categoryUpdate']);
            Route::delete('/delete/{category}', [AdminController::class, 'categoryDelete']);
        });
    });
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerPost'])->name('register.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('movie/{movie}', [HomeController::class, 'show']);
Route::post('movie/{movie}', [HomeController::class, 'ratingAdd']);
Route::get('category/{category}', [HomeController::class, 'showCategory']);

Route::prefix('user')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
});
