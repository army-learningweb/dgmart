<div class="flex justify-between items-center gap-3">

    {{-- title page --}}
    <div>
        @if (session('module_active') == 'dashboard')
           <div class="text-xl">Dashboard</div>
        @else
            <x-breadcrum/>
        @endif
    </div>

    @if (session('module_active') == 'dashboard')
        {{-- search --}}
        <div class="hidden md:block">
            <form action="">
                @csrf
                <div class="flex items-center gap-2">
                    <p>Tìm kiếm đơn hàng</p>
                    <input type="text" name="dashborad-search-order" id=""
                        placeholder="(Mã đơn, Tên khách hàng, Số điện thoại)"
                        class="dark:bg-[#1e1f20] rounded-md py-1 border-0 w-[290px] focus:border-0 focus:ring-0 text-sm shadow-md placeholder:text-gray-500">
                </div>
            </form>
        </div>
    @endif
    
    {{-- icon --}}
    <div class="flex items-center gap-3">
        
        {{-- swichtmode --}}
        <div>
            <x-button.button-switch-mode />
        </div>

        {{-- bell  --}}
        <div
            class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100 cursor-pointer relative">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>

            {{-- ping --}}
            <span class="absolute flex size-3 -top-1 right-0">
                <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-red-600 opacity-75"></span>
                <span class="relative inline-flex size-3 rounded-full bg-red-600"></span>
            </span>
        </div>

        {{-- admin --}}
        <div class="relative">
            {{-- avatar --}}
            <div class="user-avatar w-9 h-9 overflow-hidden rounded-full cursor-pointer">
                <img src="{{ asset('images/avatar.jpg') }}" alt="" class="w-full h-full object-cover">
            </div>

            {{-- menu --}}
            <div
                class="user-menu pointer-events-none opacity-0 scale-0 transition-all duration-100 z-10 shadow-md dark:shadow-none rounded-md flex flex-col items-center min-w-[100px] absolute top-11 -left-[65px]">
                <ul class="text-center w-full bg-white border border-gray-500/80 rounded-md dark:bg-[#1e1f20]">
                    <li class="py-1 border-b border-gray-500/80 w-full">
                        <a href="{{ route('profile.edit') }}"
                            class="inline-block w-full text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-emerald-500">Hồ
                            sơ</a>
                    </li>
                    <li
                        class="py-1 w-full text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-emerald-500 cursor-pointer">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <input type="submit" value="Đăng xuất" class="cursor-pointer">
                        </form>
                    </li>
                </ul>
            </div>
        </div>

    </div>


</div>
