<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RepresentanteController;
use App\Http\Controllers\CidadeController;


// Rota inicial para a página de boas-vindas
Route::get('/', function () {
    return redirect()->route('clientes.index');
});

// Rotas para clientes
Route::resource('clientes', ClienteController::class);

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index'); // Listar clientes
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create'); // Formulário de criação de clientes
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store'); // Salvar novo cliente

// Rotas para as views de Representantes
// Rota para listar representantes
Route::get('/representantes', [RepresentanteController::class, 'index'])->name('representantes.index');
Route::get('/representantes/create', [RepresentanteController::class, 'create'])->name('representantes.create');
Route::get('/representantes/{id}/edit', [RepresentanteController::class, 'edit'])->name('representantes.edit');


// Rotas para CIDADES (web)
Route::resource('cidades', CidadeController::class);


