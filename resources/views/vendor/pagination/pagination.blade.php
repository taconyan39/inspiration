@if ($paginator->hasPages())
    <nav>
        <ul class="p-pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="p-pagination__items--disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="p-pagination__items">
                    <a href="{{ $paginator->previousPageUrl() }}" class="p-pagination__items--link c-link__underline" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="p-pagination__items--disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="p-pagination__items--active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li class="p-pagination__items"><a class="p-pagination__items--link c-link__underline" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="p-pagination__items">
                    <a href="{{ $paginator->nextPageUrl() }}" class="p-pagination__items--link c-link__underline" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="p-pagination__items--disabled c-link__underline" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
