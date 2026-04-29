@php
    $request = request()->segments()[0];
@endphp

@switch($request)
@case('gioi-thieu')
        <a href="/" class="hover:text-blue-600 text-gray-500">Trang chủ</a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <a href="{{ url('gioi-thieu') }}" class="hover:text-blue-600 text-gray-800 breadcrum-active">Giới thiệu</a>
    @break
    @case('san-pham')
        <a href="/" class="hover:text-blue-600 text-gray-500">Trang chủ</a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <a href="{{ url('san-pham') }}" class="hover:text-blue-600 text-gray-800 breadcrum-active">Sản phẩm</a>
    @break
    @case('bai-viet')
        <a href="/" class="hover:text-blue-600 text-gray-500">Trang chủ</a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <a href="{{ url('bai-viet') }}" class="hover:text-blue-600 text-gray-800 breadcrum-active">Bài viết</a>
    @break
    @case('lien-he-ho-tro')
        <a href="/" class="hover:text-blue-600 text-gray-500">Trang chủ</a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <a href="{{ url('lien-he-ho-tro') }}" class="hover:text-blue-600 text-gray-800 breadcrum-active">Liên hệ & hỗ trợ</a>
    @break

    @default
       
@endswitch
