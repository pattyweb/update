@extends('layouts.app')

@section('content')
    <h1>Representantes</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Cidade</th>
            </tr>
        </thead>
        <tbody>
            @foreach($representantes as $representante)
                <tr>
                    <td>{{ $representante->id }}</td>
                    <td>{{ $representante->nome }}</td>
                    <td>{{ $representante->telefone }}</td>
                    <td>{{ $representante->cidade->nome }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
