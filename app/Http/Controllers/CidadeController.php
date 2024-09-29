<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;

class CidadeController extends Controller
{
    // Exibir lista de cidades
    public function index()
    {
        return view('cidades.index');
    }

    // Exibir formulário para criar nova cidade
    public function create()
    {
        return view('cidades.create');
    }

    // Exibir formulário para editar uma cidade
    public function edit($id)
    {
        $cidade = Cidade::find($id);
        if (!$cidade) {
            return redirect()->route('cidades.index')->with('error', 'Cidade não encontrada.');
        }
        return view('cidades.edit', compact('cidade'));
    }
}
