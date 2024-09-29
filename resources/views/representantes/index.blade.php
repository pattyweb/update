@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Representantes</h1>
<div class="border rounded p-4 mb-4">
    <div class="d-flex justify-content-between mb-3">
        <!-- Campo de pesquisa -->
        <div>
            <input type="text" id="search-representantes" class="form-control" placeholder="Pesquisar Representante" style="width: 300px;">
        </div>
        
        <!-- Botão para adicionar novo representante -->
        <button class="btn btn-success" id="add-representante-btn">Adicionar Representante</button>
    </div>

    <!-- Tabela de Representantes -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Cidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="representantes-list">
            <!-- O conteúdo será preenchido via JavaScript -->
        </tbody>
    </table>

    <!-- Links de Paginação -->
    <div class="pagination">
        <nav id="pagination-nav"></nav>
    </div>

    <!-- Modal para adicionar/editar representante -->
    <div class="modal" id="representante-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Adicionar Representante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="representante-form">
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
                            <select id="cidade_id" name="cidade_id" class="form-control" required></select>
                        </div>
                        <input type="hidden" id="representante-id">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Script para carregar os representantes via API -->
    <script>
document.addEventListener("DOMContentLoaded", function() {
    const apiURL = '/api/representantes';
    const modal = new bootstrap.Modal(document.getElementById('representante-modal'));

    // Função para carregar representantes via API com pesquisa
    function loadRepresentantes(page = 1) {
        const search = document.getElementById('search-representantes').value;
        const query = `?page=${page}&search=${encodeURIComponent(search)}`;

        fetch(apiURL + query)
            .then(response => response.json())
            .then(data => {
                if (data && data.data && Array.isArray(data.data)) {
                    let representanteList = '';
                    data.data.forEach(representante => {
                        representanteList += `
                            <tr id="representante-row-${representante.id}">
                                <td>${representante.nome}</td>
                                <td>${representante.telefone}</td>
                                <td>${representante.cidade ? representante.cidade.nome : 'Não Informada'}</td>
                                <td>
                                    <button class="btn btn-warning" onclick="editRepresentante(${representante.id})">Editar</button>
                                    <button class="btn btn-danger" onclick="deleteRepresentante(${representante.id})">Excluir</button>
                                </td>
                            </tr>
                        `;
                    });
                    document.getElementById('representantes-list').innerHTML = representanteList;

                    // Atualizar a paginação
                    configurarPaginacao(data);
                } else {
                    console.error('Erro: Estrutura de dados incorreta:', data);
                }
            })
            .catch(error => console.error('Erro ao carregar representantes:', error));
    }

    // Função para configurar a paginação
    function configurarPaginacao(paginationData) {
        const totalPaginas = paginationData.last_page;
        let paginationLinks = '';

        for (let i = 1; i <= totalPaginas; i++) {
            if (i === paginationData.current_page) {
                paginationLinks += `<span class="page-link active">${i}</span>`;
            } else {
                paginationLinks += `<a href="#" class="page-link" data-page="${i}">${i}</a>`;
            }
        }

        document.getElementById('pagination-nav').innerHTML = `
            <ul class="pagination" style="display: flex; list-style-type: none;">
                ${paginationLinks}
            </ul>
        `;

        // Adicionar eventos aos links de paginação
        document.querySelectorAll('.page-link').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const page = parseInt(event.target.getAttribute('data-page'));
                loadRepresentantes(page);
            });
        });
    }

    // Função para carregar cidades no select e selecionar a cidade correta
    function loadCidades(selectedCidadeId = null) {
        return fetch('/api/cidades')
            .then(response => response.json())
            .then(data => {
                const cidades = data.data || data;
                let cidadeOptions = '<option value="">Selecione uma cidade</option>';
                cidades.forEach(cidade => {
                    cidadeOptions += `<option value="${cidade.id}" ${selectedCidadeId == cidade.id ? 'selected' : ''}>${cidade.nome}</option>`;
                });
                document.getElementById('cidade_id').innerHTML = cidadeOptions;
            })
            .catch(error => console.error('Erro ao carregar cidades:', error));
    }

    // Função para excluir representante
    window.deleteRepresentante = function (id) {
        if (confirm('Tem certeza que deseja excluir este representante?')) {
            fetch(`${apiURL}/${id}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById(`representante-row-${id}`).remove();
                    alert('Representante excluído com sucesso!');
                } else {
                    alert('Erro ao excluir representante.');
                }
            })
            .catch(error => console.error('Erro ao excluir representante:', error));
        }
    };

    // Função para abrir o modal de edição
    window.editRepresentante = function (id) {
        fetch(`${apiURL}/${id}`)
            .then(response => response.json())
            .then(data => {
                if (data) {
                    document.getElementById('representante-id').value = data.id;
                    document.getElementById('nome').value = data.nome;
                    document.getElementById('telefone').value = data.telefone;

                    // Carregar as cidades e definir a cidade correta após o carregamento
                    loadCidades(data.cidade_id).then(() => {
                        document.querySelector('.modal-title').innerText = 'Editar Representante';
                        modal.show();
                    });
                }
            })
            .catch(error => console.error('Erro ao carregar representante:', error));
    };

    // Função para criar ou atualizar representante
    document.getElementById('representante-form').addEventListener('submit', function(event) {
        event.preventDefault();

        const id = document.getElementById('representante-id').value;
        const formData = {
            nome: document.getElementById('nome').value,
            telefone: document.getElementById('telefone').value,
            cidade_id: document.getElementById('cidade_id').value
        };

        const method = id ? 'PUT' : 'POST';
        const url = id ? `/api/representantes/${id}` : '/api/representantes';

        fetch(url, {
            method: method,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Representante salvo com sucesso!');
                modal.hide();
                loadRepresentantes();
            } else {
                alert('Erro ao salvar representante.');
            }
        })
        .catch(error => console.error('Erro ao salvar representante:', error));
    });

    // Carregar a lista de representantes e as cidades no select
    loadRepresentantes();

    // Abrir modal de criação ao clicar no botão de adicionar
    document.getElementById('add-representante-btn').addEventListener('click', function() {
        document.getElementById('representante-form').reset();
        document.getElementById('representante-id').value = '';
        document.querySelector('.modal-title').innerText = 'Adicionar Representante';
        loadCidades();  // Carregar cidades ao adicionar também
        modal.show();
    });

    // Evento de pesquisa
    document.getElementById('search-representantes').addEventListener('input', function() {
        loadRepresentantes();
    });
});
    </script>

@endsection
