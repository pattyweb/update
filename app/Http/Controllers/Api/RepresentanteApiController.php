<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Representante;
use Illuminate\Http\Request;

class RepresentanteApiController extends Controller
{
public function index(Request $request)
{
    // Inicia a query básica com o relacionamento de cidade
    $query = Representante::with('cidade');

    // Verifica se há um parâmetro de pesquisa e aplica o filtro
    if ($request->has('search') && !empty($request->search)) {
        $query->where('nome', 'like', '%' . $request->search . '%');
    }

    // Pagina os resultados
    $representantes = $query->paginate(10);

    // Retorna a resposta JSON com os resultados paginados
    return response()->json($representantes);
}

    // Mostrar um representante específico
    public function show($id)
    {
        $representante = Representante::with('cidade')->find($id);

        if ($representante) {
            return response()->json($representante);
        } else {
            return response()->json(['message' => 'Representante não encontrado'], 404);
        }
    }

    // Atualizar um representante via API
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'cidade_id' => 'required|exists:cidades,id',
        ]);

        $representante = Representante::findOrFail($id);
        $representante->update($validated);

        return response()->json(['success' => true, 'message' => 'Representante atualizado com sucesso', 'representante' => $representante]);
    }
    
    // Deletar um representante via API
    public function destroy($id)
    {
        $representante = Representante::findOrFail($id);
        $representante->delete();

        return response()->json(['success' => true, 'message' => 'Representante excluído com sucesso']);
    }

    // Criar um novo representante via API
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'cidade_id' => 'required|exists:cidades,id',
        ]);

        $representante = Representante::create($validated);

        return response()->json(['success' => true, 'message' => 'Representante criado com sucesso', 'representante' => $representante], 201);
    }
}

