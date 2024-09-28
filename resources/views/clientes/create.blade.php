@extends('layouts.app')

@section('content')
<div class="border rounded p-4 mb-4">
    <h1>Adicionar Cliente</h1>

    <form id="create-cliente-form">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" id="cpf" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" id="data_nascimento" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo</label>
            <select id="sexo" class="form-control" required>
                <option value="">Selecione</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" id="endereco" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" id="telefone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cidade" class="form-label">Cidade</label>
            <select id="cidade" class="form-control" required>
                <!-- Lista de cidades será preenchida via API -->
            </select>
        </div>
        <button type="button" class="btn btn-danger" onclick="window.location='{{ route('clientes.index') }}'">Cancelar</button>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const apiURL = '{{ url('/api/clientes') }}';
        const apiCidadesURL = '{{ url('/api/cidades') }}';

        // Função para carregar as cidades
        function loadCidades() {
            fetch(apiCidadesURL)
                .then(response => response.json())
                .then(cidades => {
                    let cidadeOptions = '<option value="">Selecione uma cidade</option>';
                    cidades.forEach(cidade => {
                        cidadeOptions += `<option value="${cidade.id}">${cidade.nome}</option>`;
                    });
                    document.getElementById('cidade').innerHTML = cidadeOptions;
                })
                .catch(error => console.error('Erro ao carregar cidades:', error));
        }

        // Carrega as cidades ao iniciar
        loadCidades();

        // Enviar o formulário via API
        document.getElementById('create-cliente-form').addEventListener('submit', function (event) {
            event.preventDefault();

            const clienteData = {
                nome: document.getElementById('nome').value,
                cpf: document.getElementById('cpf').value,
                data_nascimento: document.getElementById('data_nascimento').value,
                sexo: document.getElementById('sexo').value,
                endereco: document.getElementById('endereco').value,
                email: document.getElementById('email').value,
                telefone: document.getElementById('telefone').value,
                cidade_id: document.getElementById('cidade').value
            };

fetch(apiURL, {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify(clienteData)
})

            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Cliente adicionado com sucesso!');
                    window.location.href = '{{ route('clientes.index') }}';
                } else {
                    alert('Erro ao adicionar cliente.');
                }
            })
            .catch(error => console.error('Erro ao adicionar cliente:', error));
        });
    });
</script>
@endsection
