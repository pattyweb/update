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

        // Verifica se o parâmetro 'nome' foi enviado e adiciona à query
        if ($request->has('nome') && !empty($request->nome)) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        // Verifica se o parâmetro 'cpf' foi enviado e adiciona à query
        if ($request->has('cpf') && !empty($request->cpf)) {
            $query->where('cpf', 'like', '%' . $request->cpf . '%');
        }

        // Verifica se o parâmetro 'data_nascimento' foi enviado e adiciona à query
        if ($request->has('data_nascimento') && !empty($request->data_nascimento)) {
            $query->whereDate('data_nascimento', $request->data_nascimento);
        }

        // Verifica se o parâmetro 'cidade' foi enviado e adiciona à query
        if ($request->has('cidade') && !empty($request->cidade)) {
            $query->whereHas('cidade', function($q) use ($request) {
                $q->where('nome', 'like', '%' . $request->cidade . '%');
            });
        }

        // Verifica se o parâmetro 'sexo' foi enviado e adiciona à query
        if ($request->has('sexo') && !empty($request->sexo)) {
            $query->where('sexo', $request->sexo);
        }

        // Executa a consulta com paginação (10 clientes por página)
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
        // Validação
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

        // Retorno de resposta JSON
        return response()->json(['success' => true, 'cliente' => $cliente], 201);
    }

    // Atualizar um cliente existente
    public function update(Request $request, $id)
    {
        // Validação
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

        // Busca e atualização do cliente
        $cliente = Cliente::findOrFail($id);
        $cliente->update($validated);

        // Retorno de resposta JSON
        return response()->json(['success' => true, 'cliente' => $cliente], 200);
    }

    // Deletar um cliente
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        // Retorno de resposta JSON
        return response()->json(['success' => true, 'message' => 'Cliente deletado com sucesso!'], 200);
    }
}
