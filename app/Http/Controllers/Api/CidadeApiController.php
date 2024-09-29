<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeApiController extends Controller
{

    public function index(Request $request)
    {

        $query = Cidade::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where('nome', 'like', '%' . $request->search . '%');
        }

        // Pagina os resultados
        $cidades = $query->paginate(10);

        // Retorna a resposta JSON com os resultados paginados
        return response()->json($cidades);
    }

    // Mostrar uma cidade espec���fica
    public function show($id)
    {
        $cidade = Cidade::find($id);

        if ($cidade) {
            return response()->json($cidade);
        } else {
            return response()->json(['message' => 'Cidade não encontrada'], 404);
        }
    }

    // Adicionar uma nova cidade
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $cidade = Cidade::create($validated);

        return response()->json(['success' => true, 'cidade' => $cidade], 201);
    }

    // Atualizar uma cidade existente
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $cidade = Cidade::find($id);
        if ($cidade) {
            $cidade->update($validated);
            return response()->json(['success' => true, 'cidade' => $cidade]);
        } else {
            return response()->json(['message' => 'Cidade não encontrada'], 404);
        }
    }

    // Excluir uma cidade
// Dentro de CidadeApiController

public function destroy($id)
{
    // Buscar a cidade pelo ID
    $cidade = Cidade::findOrFail($id);

    // Verificar se a cidade está associada a algum cliente ou representante
    if ($cidade->clientes()->exists() || $cidade->representantes()->exists()) {
        return response()->json([
            'success' => false,
            'message' => 'Não é possível excluir a cidade, pois está associada a clientes ou representantes.'
        ], 400); // Retornar código 400 de erro de validação
    }

    // Tentar excluir a cidade
    try {
        $cidade->delete();
        return response()->json(['success' => true, 'message' => 'Cidade excluída com sucesso!']);
    } catch (\Exception $e) {
        // Capturar e retornar erros caso haja exceção
        return response()->json([
            'success' => false,
            'message' => 'Erro ao excluir a cidade. Tente novamente mais tarde.',
            'error' => $e->getMessage()
        ], 500); // Retornar código 500 de erro interno do servidor
    }
}





}
