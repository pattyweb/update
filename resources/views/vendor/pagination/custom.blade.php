@if ($paginator->hasPages())
    <div class="pagination">
        {{-- Link para a página anterior --}}
        @if ($paginator->onFirstPage())
            <a href="#" class="disabled">&laquo;</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
        @endif

        {{-- Links de Paginação --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="dots">{{ $element }}</span>
            @endif

            {{-- Links de Número da Página --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="#" class="active">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Link para a próxima página --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
        @else
            <a href="#" class="disabled">&raquo;</a>
        @endif
    </div>

    <style>
        /* Container da Paginação */
        .pagination {
            display: inline-block;
            padding: 2px 0;
            font-family: Arial, sans-serif;
        }

        /* Estilo dos Links de Paginação */
        .pagination a {
            color: #333;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            border: 1px solid #ddd;
            margin: 0 4px;
            transition: background-color 0.3s, color 0.3s;
            border-radius: 5px;
            font-weight: 600;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Estilo ao passar o mouse */
        .pagination a:hover {
            background-color: #f2f2f2;
            color: #007bff;
            cursor: pointer;
        }

        /* Página ativa */
        .pagination a.active {
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
        }

        /* Botão Desabilitado */
        .pagination a.disabled {
            color: #ddd;
            cursor: not-allowed;
        }

        /* Estilo dos três pontos "..." */
        .pagination .dots {
            color: #666;
            float: left;
            padding: 8px 16px;
            margin: 0 4px;
        }

        /* Adicionando espaçamento entre os elementos */
        .pagination a, .pagination .dots {
            margin: 0 6px;
        }

        /* Centraliza a paginação */
        .pagination {
            text-align: center;
            margin: 20px 0;
        }
    </style>
@endif

