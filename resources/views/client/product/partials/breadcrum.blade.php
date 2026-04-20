@php
    $num_request = request()->segments();
    $count = count($num_request);
@endphp
@switch($count)
    @case(3)
        <a href="/" class="hover:text-blue-600 text-gray-500">Trang chủ</a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <a href="{{ url('san-pham.html') }}" class="hover:text-blue-600 text-gray-500">Sản
            phẩm</a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <a href="{{ url($breadcrum_category->slug) }}" class="hover:text-blue-600 text-gray-500">{{ $breadcrum_category->name }}</a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <a href="" class="hover:text-blue-600 navigation-active">{{ $title }}</a>
    @break

    @case(2)
        <a href="/" class="hover:text-blue-600 text-gray-500">Trang chủ</a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <a href="{{ url('san-pham.html') }}" class="hover:text-blue-600 text-gray-500">Sản
            phẩm</a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <a href="" class="hover:text-blue-600 navigation-active">{{ $title }}</a>
    @break

    @default
        <a href="/" class="hover:text-blue-600 text-gray-500">Trang chủ</a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <a href="{{ url('san-pham.html') }}"
            class="hover:text-blue-600 {{ request()->segment(1) == 'san-pham.html' && request()->segment(2) == '' ? 'navigation-active' : '' }}">Sản
            phẩm</a>
@endswitch
