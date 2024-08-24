<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::apiResource('posts', PostController::class);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

//Route::apiResource('produto', [ProductController::class, 'product']);
//Route::apiResource('categoria', [CategoryController::class, 'category']);

Route::post('/produto', [ProductController::class, 'product']);
Route::get('/produto', [ProductController::class, 'product']);

Route::post('/categoria', [CategoryController::class, 'category']);
Route::get('/categoria', [CategoryController::class, 'category']);