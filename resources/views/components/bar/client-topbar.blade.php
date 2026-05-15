<div class="w-full flex justify-between items-center py-5">

    <div class="flex gap-7 items-center">
        <a href="{{ url('/') }}">
            <x-application-logo class="text-3xl py-1 mb-2" />
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
        <a href="{{ route('gio-hang') }}" class="hover:text-blue-600 relative {{ request()->segment(1) == 'gio-hang' ? 'navigation-active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>
            @if ($cart_total > 0)
                <div class="absolute -top-[7px] -right-[7px]">
                    <span class="relative flex size-5">
                        <span
                            class="absolute inline-flex h-full w-full animate-ping rounded-full bg-red-500 opacity-75"></span>
                        <span
                            class="cart-icon-qty text-white text-xs relative inline-flex size-5 rounded-full bg-red-500 justify-center items-center border border-white">
                            {{ $cart_total }}
                        </span>
                    </span>
                </div>
            @endif
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
