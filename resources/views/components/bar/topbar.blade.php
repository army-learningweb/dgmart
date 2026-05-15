<div class="flex justify-between items-center gap-3">

    {{-- title page --}}
    <div class="md:ml-1">
        @if (session('module_active') == 'dashboard')
           <div class="text-xl">Dashboard</div>
        @else
            <x-breadcrum/>
        @endif
    </div>

    @if (session('module_active') == 'dashboard')
        {{-- search --}}
        {{-- <div class="hidden md:block">
            <form action="">
                @csrf
                <div class="flex items-center gap-2">
                    <p>Tìm kiếm đơn hàng</p>
                    <input type="text" name="dashborad-search-order" id=""
                        placeholder="(Mã đơn, Tên khách hàng, Số điện thoại)"
                        class="rounded-md py-1 border-0 w-[290px] focus:border-0 focus:ring-0 text-sm shadow-md placeholder:text-gray-500">
                </div>
            </form>
        </div> --}}
    @endif
    
    {{-- icon --}}
    <div class="flex items-center gap-3">
        {{-- bell  --}}
        <div class="flex flex-col justify-end items-end">
            <span class="font-semibold">{{ Auth::user()->roles[0]->name }}</span>
            <span class="italic text-gray-500">{{ Auth::user()->roles[0]->desc }}</span>
        </div>

        {{-- admin --}}
        <div class="relative">
            {{-- avatar --}}
            <div class="user-avatar w-10 h-10 overflow-hidden rounded-full cursor-pointer">
                <img src="{{ asset('images/avatar.jpg') }}" alt="" class="w-full h-full object-cover">
            </div>

            {{-- menu --}}
            <div
                class="user-menu pointer-events-none opacity-0 scale-0 transition-all duration-100 z-10 shadow-md rounded-md flex flex-col items-center min-w-[150px] absolute top-12 -left-[110px]">
                <ul class="text-center w-full bg-white border border-gray-500/80 rounded-md">
                    <li class="py-1 border-b border-gray-500/80 w-full">
                        <a href="{{ route('profile.edit') }}"
                            class="inline-block w-full text-gray-600 hover:text-gray-900">Thay đổi mật khẩu</a>
                    </li>
                    <li
                        class="py-1 w-full text-gray-600 hover:text-gray-900 cursor-pointer">
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
