<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Representante;
use App\Models\Cidade;

class RepresentanteController extends Controller
{
    public function index()
    {
        $representantes = Representante::with('cidade')->get();
        return view('representantes.index', compact('representantes'));
    }

    public function byCidade($cidade_id)
    {
        $representantes = Representante::where('cidade_id', $cidade_id)->get();
        return view('representantes.index', compact('representantes'));
    }
}
