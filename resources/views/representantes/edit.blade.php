@extends('layouts.app')

@section('content')
<div class="border rounded p-4 mb-4">
    <h1>Editar Representante</h1>

    <form id="edit-representante-form">
        <input type="hidden" id="representante-id" name="id" value="{{ $id }}">
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
        const representanteId = '{{ $id }}';

        // Função para carregar cidades via API
        function loadCidades(selectedCidadeId = null) {
            return fetch('/api/cidades')
                .then(response => response.json())
                .then(data => {
                    let cidadeSelect = document.getElementById('cidade_id');
                    cidadeSelect.innerHTML = '<option value="">Selecione uma cidade</option>'; // Limpar antes de preencher

                    data.forEach(cidade => {
                        let option = document.createElement('option');
                        option.value = cidade.id;
                        option.text = cidade.nome;
                        // Selecionar a cidade associada ao representante
                        if (cidade.id == selectedCidadeId) {
                            option.selected = true;
                        }
                        cidadeSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Erro ao carregar cidades:', error));
        }

        // Carregar dados do representante via API
        fetch(`/api/representantes/${representanteId}`)
            .then(response => response.json())
            .then(data => {
                if (data) {
                    document.getElementById('nome').value = data.nome;
                    document.getElementById('telefone').value = data.telefone;

                    // Carregar cidades e selecionar a correta
                    loadCidades(data.cidade_id);
                } else {
                    alert('Erro ao carregar dados do representante.');
                }
            })
            .catch(error => console.error('Erro ao carregar representante:', error));

        // Enviar formulário para a API
        document.getElementById('edit-representante-form').addEventListener('submit', function(e) {
            e.preventDefault();

            let nome = document.getElementById('nome').value;
            let telefone = document.getElementById('telefone').value;
            let cidade_id = document.getElementById('cidade_id').value;

            fetch(`/api/representantes/${representanteId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ nome, telefone, cidade_id })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Representante atualizado com sucesso!');
                    window.location.href = '{{ route('representantes.index') }}';
                } else {
                    alert('Erro ao atualizar representante');
                }
            })
            .catch(error => console.error('Erro ao atualizar representante:', error));
        });
    });
</script>
@endsection
