<?php

namespace App\Http\Controllers;

use App\Models\Representante; // Certifique-se de ter o model Representante importado
use Illuminate\Http\Request;

class RepresentanteController extends Controller
{
    public function index()
    {
        // Carrega todos os representantes com suas cidades
        $representantes = Representante::with('cidade')->get();

        // Retorna a view e passa os representantes
        return view('representantes.index', compact('representantes'));
    }
}


