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
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Rotas para produtos
Route::apiResource('produto', ProductController::class)->only([
  'index', // Listar todos os produtos
  'store', // Criar um novo produto
  'show',  // Exibir detalhes de um produto específico
  'update', // Atualizar um produto existente
  'destroy' // Excluir um produto
]);

// Rotas para categorias
Route::apiResource('categorias', CategoryController::class)->only([
  'index', // Listar todas as categorias
  'store', // Criar uma nova categoria
  'show',  // Exibir detalhes de uma categoria específica
  'update', // Atualizar uma categoria existente
  'destroy' // Excluir uma categoria
]);