@if ($paginator->hasPages())
        <ul>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" style="margin-top: 2px;" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a href="#"><i class="fas fa-angle-right" aria-hidden="true"></i></a>
                </li>
            @else
                <li style="margin-top: 2px;">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <i class="fas fa-angle-right"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li style="margin-top: 2px;" class=" disabled" aria-disabled="true"><span class="">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li style="margin-top: 2px;" class="active" ><a href="#" class="">{{ $page }}</a></li>
                        @else
                            <li style="margin-top: 2px;" class=""><a class="" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li style="margin-top: 2px;">
                    <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        <i class="fas fa-angle-left"></i>
                    </a>
                </li>
            @else
                <li style="margin-top: 2px;" class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a href="#">
                        <i class="fas fa-angle-left" aria-hidden="true"></i>
                    </a>
                </li>
            @endif
        </ul>
@endif
