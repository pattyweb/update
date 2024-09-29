@extends('layouts.app')

@section('content')
<div class="border rounded p-4 mb-4">
    <h1>Lista de Cidades</h1>

    <div class="d-flex justify-content-between mb-3">
        <!-- Campo de pesquisa -->
        <div>
            <input type="text" id="search-cidades" class="form-control" placeholder="Pesquisar Cidade" style="width: 300px;">
        </div>

        <!-- Botão para adicionar nova cidade -->
        <button class="btn btn-success" id="add-cidade-btn">Adicionar Cidade</button>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome da Cidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="city-list">
            <!-- As cidades serão preenchidas aqui via JavaScript -->
        </tbody>
    </table>

    <!-- Links de Paginação -->
    <div class="pagination">
        <nav id="pagination-nav"></nav>
    </div>

    <!-- Modal para adicionar/editar cidade -->
    <div class="modal" id="cidade-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Adicionar Cidade</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="cidade-form">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" id="nome" name="nome" class="form-control" required>
                        </div>
                        <input type="hidden" id="cidade-id">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Script para carregar as cidades via API -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const apiURL = '/api/cidades';
        const modal = new bootstrap.Modal(document.getElementById('cidade-modal'));

        // Função para carregar cidades com pesquisa e paginação
        function loadCidades(page = 1) {
            const search = document.getElementById('search-cidades').value;
            const query = `?page=${page}&search=${encodeURIComponent(search)}`;

            fetch(apiURL + query)
                .then(response => response.json())
                .then(data => {
                    if (data && data.data && Array.isArray(data.data)) {
                        let cityList = '';
                        data.data.forEach(cidade => {
                            cityList += `
                                <tr id="cidade-row-${cidade.id}">
                                    <td>${cidade.nome}</td>
                                    <td>
                                        <button class="btn btn-warning" onclick="editCidade(${cidade.id})">Editar</button>
                                        <button class="btn btn-danger" onclick="deleteCidade(${cidade.id})">Excluir</button>
                                    </td>
                                </tr>
                            `;
                        });
                        document.getElementById('city-list').innerHTML = cityList;

                        // Atualizar a paginação
                        configurarPaginacao(data);
                    } else {
                        console.error('Erro: Estrutura de dados incorreta:', data);
                    }
                })
                .catch(error => console.error('Erro ao carregar cidades:', error));
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
                    loadCidades(page);
                });
            });
        }

        // Função para excluir cidade
window.deleteCidade = function(id) {
    if (confirm('Tem certeza que deseja excluir esta cidade?')) {
        fetch(`/api/cidades/${id}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById(`cidade-row-${id}`).remove();
                alert(data.message);
            } else {
                alert(data.message);  // Mostra a mensagem de erro do servidor
            }
        })
        .catch(error => console.error('Erro ao excluir cidade:', error));
    }
};



        // Função para abrir o modal de edição
        window.editCidade = function(id) {
            fetch(`${apiURL}/${id}`)
                .then(response => response.json())
                .then(data => {
                    if (data) {
                        document.getElementById('cidade-id').value = data.id;
                        document.getElementById('nome').value = data.nome;

                        document.querySelector('.modal-title').innerText = 'Editar Cidade';
                        modal.show();
                    }
                })
                .catch(error => console.error('Erro ao carregar cidade:', error));
        };

        // Função para criar ou atualizar cidade
        document.getElementById('cidade-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const id = document.getElementById('cidade-id').value;
            const formData = {
                nome: document.getElementById('nome').value
            };

            const method = id ? 'PUT' : 'POST';
            const url = id ? `/api/cidades/${id}` : '/api/cidades';

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
                    alert('Cidade salva com sucesso!');
                    modal.hide();
                    loadCidades();
                } else {
                    alert('Erro ao salvar cidade.');
                }
            })
            .catch(error => console.error('Erro ao salvar cidade:', error));
        });

        // Carregar a lista de cidades
        loadCidades();

        // Abrir modal de criação ao clicar no botão de adicionar
        document.getElementById('add-cidade-btn').addEventListener('click', function() {
            document.getElementById('cidade-form').reset();
            document.getElementById('cidade-id').value = '';
            document.querySelector('.modal-title').innerText = 'Adicionar Cidade';
            modal.show();
        });

        // Evento de pesquisa
        document.getElementById('search-cidades').addEventListener('input', function() {
            loadCidades();
        });
    });
</script>

@endsection
