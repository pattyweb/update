<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClienteApiController;
use App\Http\Controllers\Api\CidadeApiController;
use App\Http\Controllers\Api\RepresentanteApiController;

// Rotas de Clientes
Route::prefix('clientes')->group(function () {
    Route::get('/', [ClienteApiController::class, 'index']);
    Route::post('/', [ClienteApiController::class, 'store']);
    Route::get('/{id}', [ClienteApiController::class, 'show']);
    Route::put('/{id}', [ClienteApiController::class, 'update']);
    Route::delete('/{id}', [ClienteApiController::class, 'destroy']);
});

// Rotas de Cidades
Route::prefix('cidades')->group(function () {
    Route::get('/', [CidadeApiController::class, 'index']);
    Route::post('/', [CidadeApiController::class, 'store']);
    Route::get('/{id}', [CidadeApiController::class, 'show']);
    Route::put('/{id}', [CidadeApiController::class, 'update']);
    Route::delete('/{id}', [CidadeApiController::class, 'destroy']);
});

// Rotas de Representantes
Route::prefix('representantes')->group(function () {
    Route::get('/', [RepresentanteApiController::class, 'index']);
    Route::post('/', [RepresentanteApiController::class, 'store']);
    Route::get('/{id}', [RepresentanteApiController::class, 'show']);
    Route::put('/{id}', [RepresentanteApiController::class, 'update']);
    Route::delete('/{id}', [RepresentanteApiController::class, 'destroy']);
});

