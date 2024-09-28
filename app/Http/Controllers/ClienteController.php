<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Cidade;

class ClienteController extends Controller
{
    // Exibe a lista de clientes com filtros
    public function index(Request $request)
    {
        // Inicia a query com o modelo Cliente
        $query = Cliente::with('cidade');

        // Aplica filtros se fornecidos
        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->input('nome') . '%');
        }

        if ($request->filled('cpf')) {
            $query->where('cpf', $request->input('cpf'));
        }

        if ($request->filled('data_nascimento')) {
            $query->whereDate('data_nascimento', $request->input('data_nascimento'));
        }

        if ($request->filled('cidade')) {
            $query->whereHas('cidade', function($q) use ($request) {
                $q->where('nome', 'like', '%' . $request->input('cidade') . '%');
            });
        }

        if ($request->filled('sexo')) {
            $query->where('sexo', $request->input('sexo'));
        }

        // Pagina os resultados (10 por página)
        $clientes = $query->paginate(10);

        // Retorna a view com os clientes filtrados
        return view('clientes.index', compact('clientes'));
    }

    // Exibe o formulário de criação de cliente
    public function create()
    {
        $cidades = Cidade::all();
        return view('clientes.create', compact('cidades'));
    }

    // Armazena um novo cliente
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:clientes,cpf', // Validação para CPF único
            'data_nascimento' => 'required|date',
            'sexo' => 'required|in:Masculino,Feminino',
            'endereco' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email',
            'telefone' => 'required|string|max:20',
            'cidade_id' => 'required|exists:cidades,id',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente criado com sucesso!');
    }

    // Exibe o formulário de edição de cliente
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cidades = Cidade::all();
        return view('clientes.edit', compact('cliente', 'cidades'));
    }

    // Atualiza um cliente existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:clientes,cpf,' . $id, // Validação para CPF único
            'data_nascimento' => 'required|date',
            'sexo' => 'required|in:Masculino,Feminino',
            'endereco' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email,' . $id,
            'telefone' => 'required|string|max:20',
            'cidade_id' => 'required|exists:cidades,id',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    // Exclui um cliente
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso!');
    }
}
