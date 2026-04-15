<div class="w-full flex justify-between items-center py-5 pb-2">

    <div class="flex gap-5 items-center">
        <a href="">
            <x-application-logo class="text-3xl py-1"/>
        </a>
        <div class="flex items-center gap-1 bg-white px-2 rounded-md shadow-sm">
            <input type="search" name="hot-search" id="hot-search" placeholder="Tìm kiếm sản phẩm" class="rounded-md text-sm border-0 md:min-w-[400px] px-1 focus:border-0 focus:ring-0 focus:outline-0">
            <div class="text-gray-500/50 select-none">|</div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>

        </div>
    </div>
    
    <div class="flex gap-2">
        {{-- cart --}}
        <a href="" class="hover:text-blue-600 relative">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>
            <div class="absolute -top-1 -right-1">
                <span class="relative flex size-3">
                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-red-500 opacity-75"></span>
                    <span class="relative inline-flex size-3 rounded-full bg-red-500"></span>
                </span>
            </div>    
        </a>

        {{-- heart --}}
        <div class="text-gray-500/50 select-none">|</div>
        <a href="" class="hover:text-blue-600 relative">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
            </svg>
            <div class="absolute -top-1 -right-1">
                <span class="relative flex size-3">
                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-pink-500 opacity-75"></span>
                    <span class="relative inline-flex size-3 rounded-full bg-pink-500"></span>
                </span>
            </div>    
        </a>

        {{-- user --}}
        <div class="text-gray-500/50 select-none">|</div>
        <a href="" class="hover:text-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
        </a>
    </div>
</div>
