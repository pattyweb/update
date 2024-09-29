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
            <label for="cidade_id" class="form-label">Cidade</label>
            <select id="cidade_id" class="form-control" required>
                <!-- Lista de cidades será preenchida via API -->
            </select>
        </div>
        <button type="button" class="btn btn-danger" onclick="window.location='{{ route('clientes.index') }}'">Cancelar</button>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // URL da API para carregar cidades
    const apiCidadesURL = '/api/cidades';
    const apiURL = '/api/clientes'; // URL da API para enviar o cliente

    // Função para carregar cidades via API
    function loadCidades() {
        fetch(apiCidadesURL)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro ao carregar cidades: ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                // Verifica se a resposta contém um array de cidades (paginado ou não)
                let cidades = data.data || data;
                if (Array.isArray(cidades)) {
                    let cidadeOptions = '<option value="">Selecione uma cidade</option>'; // Opção inicial vazia
                    cidades.forEach(cidade => {
                        cidadeOptions += `<option value="${cidade.id}">${cidade.nome}</option>`;
                    });

                    const cidadeSelect = document.getElementById('cidade_id');
                    if (cidadeSelect) {
                        cidadeSelect.innerHTML = cidadeOptions; // Preenche o select com as cidades
                    } else {
                        console.error('Erro: O elemento select com ID "cidade_id" não foi encontrado no DOM.');
                    }
                } else {
                    console.error('Erro: A resposta da API não contém um array de cidades:', data);
                }
            })
            .catch(error => console.error('Erro ao carregar cidades:', error));
    }

    // Chama a função para carregar as cidades
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
            cidade_id: document.getElementById('cidade_id').value // Note o uso de 'cidade_id'
        };

        fetch(apiURL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(clienteData)
        })
        .then(response => {
            if (!response.ok) {
                // Se a resposta não for OK, é possível que a API tenha retornado um erro
                return response.text().then(text => { throw new Error(text) });
            }
            return response.json(); // Se for OK, parseie como JSON
        })
        .then(data => {
            if (data.success) {
                alert('Cliente adicionado com sucesso!');
                window.location.href = '{{ route('clientes.index') }}';
            } else {
                alert('Erro ao adicionar cliente: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Erro ao adicionar cliente:', error);
            alert('Erro ao adicionar cliente: ' + error.message);
        });
    });
});
</script>

@endsection
