<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClienteApiController;
use App\Http\Controllers\Api\CidadeApiController;

// Rota da API para listar clientes
Route::get('/clientes', [ClienteApiController::class, 'index']);

// Rota da API para mostrar um cliente específico
Route::get('/clientes/{id}', [ClienteApiController::class, 'show']);

// Rota para criar um novo cliente (requisição POST)
Route::post('/clientes', [ClienteApiController::class, 'store']);

// Rota para atualizar um cliente existente (requisição PUT ou PATCH)
Route::put('/clientes/{id}', [ClienteApiController::class, 'update']);
Route::patch('/clientes/{id}', [ClienteApiController::class, 'update']);

// Rota para excluir um cliente (requisição DELETE)
Route::delete('/clientes/{id}', [ClienteApiController::class, 'destroy']);

// Rota para buscar todas as cidades
Route::get('/cidades', [CidadeApiController::class, 'index']);
