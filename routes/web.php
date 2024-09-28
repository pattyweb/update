<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RepresentanteController;


// Rota inicial para a página de boas-vindas
Route::get('/', function () {
    return redirect()->route('clientes.index');
});

// Rotas para clientes
Route::resource('clientes', ClienteController::class);

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index'); // Listar clientes
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create'); // Formulário de criação de clientes
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store'); // Salvar novo cliente

// Rotas para representantes
Route::get('/representantes', [RepresentanteController::class, 'index'])->name('representantes.index'); // Listar representantes
Route::get('/representantes/cidade/{cidade_id}', [RepresentanteController::class, 'byCidade'])->name('representantes.byCidade'); // Filtrar representantes por cidade


