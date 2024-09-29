@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Clientes</h1>

    <!-- Formulário de Filtros -->
    <div class="border rounded p-4 mb-4">
        <h4>Consultar Clientes</h4>
        <form id="filtro-clientes" class="mb-4">
            <div class="row">
                <div class="col-md-3 mb-2">
                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do Cliente">
                </div>
                <div class="col-md-3">
                    <input type="text" name="cpf" id="cpf" class="form-control" placeholder="CPF">
                </div>
                <div class="col-md-3">
                    <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" placeholder="Data de Nascimento">
                </div>
                <div class="col-md-3">
                    <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade">
                </div>
                <div class="col-md-3">
                    <select name="sexo" id="sexo" class="form-control">
                        <option value="">Sexo</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                    <button type="button" id="limpar-filtros" class="btn btn-secondary">Limpar Filtros</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Tabela de Clientes -->
    <div class="border rounded p-4 mb-4">
        <h4>Tabela dos Clientes</h4>
        <a href="{{ route('clientes.create') }}" class="btn btn-success mb-3">Adicionar Cliente</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome do Cliente</th>
                    <th>CPF</th>
                    <th>Data Nasc</th>
                    <th>Cidade</th>
                    <th>Sexo</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody id="client-list">
                <!-- Os dados dos clientes serão preenchidos aqui via JavaScript -->
            </tbody>
        </table>

        <!-- Links de Paginação -->
        <div class="pagination">
            <nav id="pagination-nav"></nav>
        </div>
    </div>

    <!-- Script para carregar os clientes via API com filtro e paginação manual -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const apiURL = '{{ url('/api/clientes') }}';
            let clientesPorPagina = 10;
            let paginaAtual = 1;
            let clientesData = [];

            // Função para carregar clientes com filtros e paginação
            function loadClientes(page = 1) {
                paginaAtual = page;

                const nome = document.getElementById('nome').value;
                const cpf = document.getElementById('cpf').value;
                const dataNascimento = document.getElementById('data_nascimento').value;
                const cidade = document.getElementById('cidade').value;
                const sexo = document.getElementById('sexo').value;

                const query = `?page=${page}&nome=${encodeURIComponent(nome)}&cpf=${encodeURIComponent(cpf)}&data_nascimento=${encodeURIComponent(dataNascimento)}&cidade=${encodeURIComponent(cidade)}&sexo=${encodeURIComponent(sexo)}`;

                fetch(apiURL + query)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Erro ao carregar clientes');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data && Array.isArray(data.data)) {
                            clientesData = data.data; // Acessando a lista de clientes dentro do objeto paginado
                            mostrarClientesPorPagina();
                            configurarPaginacao(data);
                        } else {
                            console.error('Erro: Resposta inesperada da API', data);
                        }
                    })
                    .catch(error => console.error('Erro ao carregar clientes:', error));
            }

            // Função para exibir os clientes na página atual
            function mostrarClientesPorPagina() {
                let clientList = '';

                clientesData.forEach(cliente => {
                    clientList += `
                        <tr>
                            <td>${cliente.nome}</td>
                            <td>${cliente.cpf}</td>
                            <td>${cliente.data_nascimento ? new Date(cliente.data_nascimento).toLocaleDateString() : 'Não Informado'}</td>
                            <td>${cliente.cidade ? cliente.cidade.nome : 'Não Informada'}</td>
                            <td>${cliente.sexo}</td>
                            <td><a href="/clientes/${cliente.id}/edit" class="btn btn-warning">Editar</a></td>
                            <td>
                                <form action="/clientes/${cliente.id}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    `;
                });

                document.getElementById('client-list').innerHTML = clientList;
            }

            // Função para configurar os links de paginação
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
                        loadClientes(page);
                    });
                });
            }

            // Carregar clientes na primeira carga da página
            loadClientes();

            // Evento de filtro
            document.getElementById('filtro-clientes').addEventListener('submit', function(event) {
                event.preventDefault();
                loadClientes();
            });

            // Limpar filtros
            document.getElementById('limpar-filtros').addEventListener('click', function() {
                document.getElementById('filtro-clientes').reset();
                loadClientes();
            });
        });
    </script>
@endsection
