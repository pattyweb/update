@extends('layouts.app')

@section('content')
<div class="border rounded p-4 mb-4">
    <h1>Editar Cliente</h1>

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" value="{{ $cliente->nome }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" value="{{ $cliente->cpf }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" name="data_nascimento" value="{{ $cliente->data_nascimento }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo</label>
            <select name="sexo" class="form-control" required>
                <option value="Masculino" {{ $cliente->sexo == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="Feminino" {{ $cliente->sexo == 'Feminino' ? 'selected' : '' }}>Feminino</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" name="endereco" value="{{ $cliente->endereco }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" value="{{ $cliente->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" value="{{ $cliente->telefone }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cidade_id" class="form-label">Cidade</label>
            <select name="cidade_id" class="form-control" required>
                @foreach($cidades as $cidade)
                    <option value="{{ $cidade->id }}" {{ $cliente->cidade_id == $cidade->id ? 'selected' : '' }}>
                        {{ $cidade->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="button" class="btn btn-danger" onclick="window.location='{{ route('clientes.index') }}'">Cancelar</button>


        <button type="submit" class="btn btn-success">Salvar</button>

    </form>
</div>
@endsection

