@extends('layouts.app')

@section('content')
<div class="border rounded p-4 mb-4">
    <h1>Editar Cliente</h1>

    <form id="edit-cliente-form">
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
            <select id="cidade" class="form-control" required></select>
        </div>

        <button type="button" class="btn btn-danger" onclick="window.location='{{ route('clientes.index') }}'">Cancelar</button>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const clienteId = '{{ $cliente->id }}';  // Pegar o ID do cliente da rota
        const apiURL = `/api/clientes/${clienteId}`;  // URL da API para o cliente atual
        const apiCidadesURL = '/api/cidades';  // URL para buscar cidades

        // Função para carregar o cliente e cidades via API
        function loadCliente() {
            // Carregar dados do cliente
            fetch(apiURL)
                .then(response => response.json())
                .then(cliente => {
                    document.getElementById('nome').value = cliente.nome;
                    document.getElementById('cpf').value = cliente.cpf;
                    document.getElementById('data_nascimento').value = cliente.data_nascimento;
                    document.getElementById('sexo').value = cliente.sexo;
                    document.getElementById('endereco').value = cliente.endereco;
                    document.getElementById('email').value = cliente.email;
                    document.getElementById('telefone').value = cliente.telefone;

                    // Carregar cidades e selecionar a correta
                    fetch(apiCidadesURL)
                        .then(response => response.json())
                        .then(data => {
                            let cidadeOptions = '<option value="">Selecione uma cidade</option>';
                            const cidades = data.data || data;  // Verifica se é paginado ou não
                            cidades.forEach(cidade => {
                                cidadeOptions += `<option value="${cidade.id}" ${cliente.cidade_id == cidade.id ? 'selected' : ''}>${cidade.nome}</option>`;
                            });
                            document.getElementById('cidade').innerHTML = cidadeOptions;
                        })
                        .catch(error => console.error('Erro ao carregar cidades:', error));
                })
                .catch(error => console.error('Erro ao carregar cliente:', error));
        }

        // Carregar cliente e cidades assim que a página carregar
        loadCliente();

        // Enviar o formulário via API para atualizar o cliente
        document.getElementById('edit-cliente-form').addEventListener('submit', function(event) {
            event.preventDefault();  // Impedir envio padrão do formulário

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
                method: 'PUT',  // Método PUT para atualização
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(clienteData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Cliente atualizado com sucesso!');
                    window.location.href = '{{ route("clientes.index") }}';
                } else {
                    alert('Erro ao atualizar cliente.');
                }
            })
            .catch(error => console.error('Erro ao atualizar cliente:', error));
        });
    });
</script>
@endsection
