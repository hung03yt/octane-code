<?php

use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\RatingController;
use App\Http\Controllers\Api\CategoryMovieController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('movies', MovieController::class);
Route::apiResource('ratings', RatingController::class);
Route::apiResource('category_movie', CategoryMovieController::class);
Route::apiResource('categories', CategoryController::class);
