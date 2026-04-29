<div class="w-full flex justify-between items-center py-5 pb-2">

    <div class="flex gap-7 items-center">
        <a href="{{ url('/') }}">
            <x-application-logo class="text-3xl py-1" />
        </a>

        <div>
            <x-bar.client-navigation-bar />
        </div>
    </div>

    <div class="flex items-center gap-2">

        {{-- hour --}}
        <div class="flex gap-3 select-none py-4 items-center">
            <div class="text-gray-500 flex items-center gap-2">
                <span class="text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </span>
                <div>8:00 - 17:00</div>
            </div>
            <div class="text-gray-500/50 select-none">|</div>
        </div>

        {{-- cart --}}
        <a href="" class="hover:text-blue-600 relative">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>
            <div class="absolute -top-[5px] -right-[4px]">
                <span class="relative flex size-4">
                    <span
                        class="absolute inline-flex h-full w-full animate-ping rounded-full bg-red-500 opacity-75"></span>
                    <span class="relative inline-flex size-4 rounded-full bg-red-500"></span>
                </span>
            </div>
        </a>

        {{-- user --}}
        <div class="text-gray-500/50 select-none">|</div>
        <a href="" class="hover:text-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
        </a>


    </div>
</div>
