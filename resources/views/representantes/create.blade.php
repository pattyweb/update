@extends('layouts.app')

@section('content')
<div class="border rounded p-4 mb-4">
    <h1>Adicionar Representante</h1>

    <form id="create-representante-form">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" id="telefone" name="telefone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cidade_id" class="form-label">Cidade</label>
            <select id="cidade_id" name="cidade_id" class="form-control" required>
                <!-- Opções de cidades serão carregadas via API -->
            </select>
        </div>
        <button type="button" class="btn btn-danger" onclick="window.location='{{ route('representantes.index') }}'">Cancelar</button>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const apiCidadesURL = '/api/cidades';

        // Função para carregar cidades via API
        function loadCidades() {
            fetch(apiCidadesURL)
                .then(response => response.json())
                .then(data => {
                    const cidades = data.data || data;  // Verifica se o retorno é paginado ou não
                    let cidadeOptions = '<option value="">Selecione uma cidade</option>';
                    cidades.forEach(cidade => {
                        cidadeOptions += `<option value="${cidade.id}">${cidade.nome}</option>`;
                    });
                    document.getElementById('cidade_id').innerHTML = cidadeOptions;
                })
                .catch(error => console.error('Erro ao carregar cidades:', error));
        }

        // Chama a função para carregar as cidades
        loadCidades();

        // Enviar formulário para a API
        document.getElementById('create-representante-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const representanteData = {
                nome: document.getElementById('nome').value,
                telefone: document.getElementById('telefone').value,
                cidade_id: document.getElementById('cidade_id').value
            };

            fetch('/api/representantes', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: JSON.stringify(representanteData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Representante criado com sucesso!');
                    window.location.href = '{{ route('representantes.index') }}';
                } else {
                    alert('Erro ao criar representante.');
                }
            })
            .catch(error => console.error('Erro ao criar representante:', error));
        });
    });
</script>
@endsection
