@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">

        <div class="flex gap-2 items-center justify-between sm:hidden">

            @if ($paginator->onFirstPage())
                <span
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 cursor-not-allowed leading-5 rounded-md">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" module={{ $module }}
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-800 leading-5 rounded-md">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" module={{ $module }}
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-800 leading-5 rounded-md hover:text-gray-700">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 cursor-not-allowed leading-5 rounded-md">
                    {!! __('pagination.next') !!}
                </span>
            @endif

        </div>

        <div class="hidden sm:flex-1 sm:flex sm:gap-2 sm:items-center sm:justify-between">

            <div>
                <p class="text-sm text-gray-700 leading-5">
                    @if ($paginator->firstItem())
                        <div class="flex gap-2">
                            {{-- <div>Tổng <span class="font-medium">{{ $paginator->total() }}</span> - </div> --}}
                            {{-- <div>Hiển thị <span class="font-medium">{{ $paginator->firstItem() }}</span></div> --}}
                            {{-- <div> -> <span class="font-medium">{{ $paginator->lastItem() }}</span></div> --}}
                        </div>
                    @else
                        {{ $paginator->count() }}
                    @endif
                </p>
            </div>

            <div>
                <span class="inline-flex rtl:flex-row-reverse rounded-md">

                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span
                                class="inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500/30 cursor-not-allowed rounded-l-md leading-5"
                                aria-hidden="true">
                                << </span>
                            </span>
                        @else
                            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" module={{ $module }}
                                class="inline-flex items-center px-2 py-2 text-sm font-medium text-blue-600 hover:underline underline-offset-1 rounded-l-md leading-5"
                                aria-label="{{ __('pagination.previous') }}">
                                << </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span
                                    class="inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 cursor-default leading-5">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span
                                            class="inline-flex items-center px-3 py-2 -ml-px text-sm font-medium text-blue-600 cursor-default leading-5">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" module={{ $module }}
                                        class="inline-flex items-center px-3 py-2 -ml-px text-sm font-medium text-gray-700 leading-5"
                                        aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" module={{ $module }}
                            class="inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-blue-600 hover:underline underline-offset-1 rounded-r-md leading-5 "
                            aria-label="{{ __('pagination.next') }}">
                            >>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span
                                class="inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500/30 cursor-not-allowed rounded-r-md leading-5"
                                aria-hidden="true">
                                >> </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
