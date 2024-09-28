@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Clientes</h1>

    <!-- Formulário de Filtros -->
    <div class="border rounded p-4 mb-4">
    <h4>Consultar Clientes</h4>
    <form method="GET" action="{{ route('clientes.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-3 mb-2">
                <input type="text" name="nome" value="{{ request('nome') }}" class="form-control" placeholder="Nome do Cliente">
            </div>
            <div class="col-md-3">
                <input type="text" name="cpf" value="{{ request('cpf') }}" class="form-control" placeholder="CPF">
            </div>
            <div class="col-md-3">
                <input type="date" name="data_nascimento" value="{{ request('data_nascimento') }}" class="form-control" placeholder="Data de Nascimento">
            </div>
            <div class="col-md-3">
                <input type="text" name="cidade" value="{{ request('cidade') }}" class="form-control" placeholder="Cidade">
            </div>
            <div class="col-md-3">
                <select name="sexo" class="form-control">
                    <option value="">Sexo</option>
                    <option value="Masculino" {{ request('sexo') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="Feminino" {{ request('sexo') == 'Feminino' ? 'selected' : '' }}>Feminino</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Filtrar</button>
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Limpar Filtros</a>
            </div>
        </div>
    </form>
    </div>

    <!-- Tabela de Clientes -->
    <div class="border rounded p-4 mb-4">
    <h4>Tabela dos Clientes</h4>
    <a href="{{ route('clientes.create') }}" class="btn btn-success mb-3">Adicionar Cliente</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome do Cliente</th>
                <th>CPF</th>
                <th>Data Nasc</th>
                <th>Cidade</th>
                <th>Sexo</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->cpf }}</td>

                    <td>
                        @if($cliente->data_nascimento)
                            {{ \Carbon\Carbon::parse($cliente->data_nascimento)->format('d/m/Y') }}
                        @else
                            Não Informado
                        @endif
                    </td>

                    <td>{{ $cliente->cidade->nome }}</td>
                    <td>{{ $cliente->sexo }}</td>

                    <td>
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning">Editar</a>
                    </td>

                    <td>
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Links de Paginação -->
<div class="pagination">
        {{ $clientes->links('vendor.pagination.custom') }}

    </div>
    </div>
@endsection
