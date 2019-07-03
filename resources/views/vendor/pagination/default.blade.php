<a href="" class="btSeta1"></a> <div id="pags">1 de 10</div> <a href="" class="btSeta2"></a> 
<select id="paginas">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
</select>

@if ($paginator->hasPages())

        @if ($paginator->onFirstPage())
                <span aria-hidden="true">&lsaquo;</span>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" class="btSeta1"></a>
            </li>
        @endif

        <div id="pags">1 de 10</div>

        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" class="btSeta2"></a>
            </li>
        @else
                <span aria-hidden="true">&rsaquo;</span>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)

            {{-- Array Of Links --}}
            <select id="paginas">
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <option>{{ $page }}</option>
                    @else
                        <option><a href="{{ $url }}">{{ $page }}</a></option>
                    @endif
                @endforeach
            @endif
            </select>
        @endforeach

@endif
