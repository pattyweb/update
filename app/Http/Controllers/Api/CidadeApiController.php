<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeApiController extends Controller
{
    // Função para retornar todas as cidades
    public function index()
    {
        // Busca todas as cidades do banco de dados
        $cidades = Cidade::all();

        // Retorna as cidades no formato JSON
        return response()->json($cidades);
    }
}

