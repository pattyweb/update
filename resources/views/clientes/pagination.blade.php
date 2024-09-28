@if ($paginator->hasPages())
    <div class="pagination">
        {{-- Link para a página anterior --}}
        @if ($paginator->onFirstPage())
            <a href="#">&laquo;</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
        @endif

        {{-- Links de Paginação --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span>{{ $element }}</span>
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
            <a href="#">&raquo;</a>
        @endif
    </div>
@endif
