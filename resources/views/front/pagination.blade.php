@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        @if ($paginator->onFirstPage())
            <li class="page-item"> <a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <i
                        class="fe-arrow-left"></i> </a> </li>
        @else
            <li class="page-item"> <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1"
                    aria-disabled="true"> <i class="fe-arrow-left"></i> </a> </li>
        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item"><a class="page-link" href="javascript:;">{{ $element }}</a></li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><a class="page-link" href="javascript:;">{{ $page }}</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <li class="page-item"> <a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i
                        class="fe-arrow-right"></i></a> </li>
        @else
            <li class="page-item"> <a class="page-link" href="#"><i class="fe-arrow-right"></i></a> </li>
        @endif
    </ul>
@endif
