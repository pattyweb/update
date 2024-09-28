@extends('layouts.app')

@section('content')
<div class="border rounded p-4 mb-4">
    <h1>Adicionar Cliente</h1>

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" name="data_nascimento" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo</label>
            <select name="sexo" class="form-control" required>
                <option value="">Selecione</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" name="endereco" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cidade_id" class="form-label">Cidade</label>
            <select name="cidade_id" class="form-control" required>
                <option value="">Selecione uma cidade</option>
                @foreach($cidades as $cidade)
                    <option value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
                @endforeach
            </select>
        </div>
        <button type="button" class="btn btn-danger" onclick="window.location='{{ route('clientes.index') }}'">Cancelar</button>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection

