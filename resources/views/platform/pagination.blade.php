@if ($paginator->hasPages())

        @if ($paginator->onFirstPage())
                <span aria-hidden="true">&lsaquo;</span>
        @else
                <a href="{{ $paginator->previousPageUrl() }}" class="btSeta1"></a>
        @endif

        <div id="pags">1 de 10</div>

        @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="btSeta2"></a>
        @else
                <span aria-hidden="true">&rsaquo;</span>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)

            {{-- Array Of Links --}}
            <select id="paginas" onchange="location = this.value;">
            @if (is_array($element))
                @foreach ($element as $pageElement => $url)
                    <option value="{{ $url }}" {{ ($pageElement == $paginator->currentPage()) ? 'selected' : '' }}">{{ $pageElement }}</option>
                @endforeach
            @endif
            </select>
        @endforeach

@endif



@section('scripts')
    @parent

    <script type="text/javascript">
        
        $(document).ready(function(){

            $('#paginas').on('change', function(e) {
                window.location = $(this).val();
            });

        });
    </script>

@endsection