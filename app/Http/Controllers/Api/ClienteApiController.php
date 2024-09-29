<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteApiController extends Controller
{
    // Listar todos os clientes com filtros e paginação
    public function index(Request $request)
    {
        // Inicia uma query básica em 'Cliente'
        $query = Cliente::with('cidade');

        // Filtrar por nome
        if ($request->has('nome') && !empty($request->nome)) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        // Filtrar por CPF
        if ($request->has('cpf') && !empty($request->cpf)) {
            $query->where('cpf', 'like', '%' . $request->cpf . '%');
        }

        // Filtrar por data de nascimento
        if ($request->has('data_nascimento') && !empty($request->data_nascimento)) {
            $query->whereDate('data_nascimento', $request->data_nascimento);
        }

        // Filtrar por cidade (relacionamento)
        if ($request->has('cidade') && !empty($request->cidade)) {
            $query->whereHas('cidade', function($q) use ($request) {
                $q->where('nome', 'like', '%' . $request->cidade . '%');
            });
        }

        // Filtrar por sexo
        if ($request->has('sexo') && !empty($request->sexo)) {
            $query->where('sexo', $request->sexo);
        }

        // Paginação (10 clientes por página)
        $clientes = $query->paginate(10);

        // Retorna o resultado paginado
        return response()->json($clientes);
    }

    // Mostrar um cliente específico
    public function show($id)
    {
        $cliente = Cliente::with('cidade')->find($id);

        if ($cliente) {
            return response()->json($cliente);
        } else {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }
    }

    // Criar um novo cliente
    public function store(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:clientes,cpf',
            'data_nascimento' => 'required|date',
            'sexo' => 'required|in:Masculino,Feminino',
            'endereco' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email',
            'telefone' => 'required|string|max:20',
            'cidade_id' => 'required|exists:cidades,id',
        ]);

        // Criação do cliente
        $cliente = Cliente::create($validated);

        // Retorna o cliente recém-criado
        return response()->json(['success' => true, 'cliente' => $cliente], 201);
    }

    // Atualizar um cliente existente
    public function update(Request $request, $id)
    {
        // Validação dos dados de entrada
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:clientes,cpf,' . $id,
            'data_nascimento' => 'required|date',
            'sexo' => 'required|in:Masculino,Feminino',
            'endereco' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email,' . $id,
            'telefone' => 'required|string|max:20',
            'cidade_id' => 'required|exists:cidades,id',
        ]);

        // Atualização do cliente
        $cliente = Cliente::findOrFail($id);
        $cliente->update($validated);

        // Retorno da resposta com os dados atualizados
        return response()->json(['success' => true, 'cliente' => $cliente], 200);
    }

    // Deletar um cliente
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);

        // Excluir o cliente
        $cliente->delete();

        return response()->json(['success' => true, 'message' => 'Cliente deletado com sucesso!'], 200);
    }
}
