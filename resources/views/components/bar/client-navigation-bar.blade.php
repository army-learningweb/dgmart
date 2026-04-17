@if (isset($menus))
    @if ($menus->count() > 0)
        <div class="bg-white px-3 rounded-xl flex justify-between shadow-sm">
            <ul class="flex gap-7">
                @foreach ($menus->where('parent_id', 0) as $menu)
                    <li class="relative group">
                        <a href="{{ $menu->slug == 'trang-chu' ? '/' : $menu->slug.'.html' }}"
                            class="group-hover:text-blue-600 hover:text-blue-600 flex items-center gap-1 py-5 {{ session('client_module_active') == $menu->slug.".html" ? "navigation-active" : '' }}{{ session('client_module_active') == '' && $menu->slug == 'trang-chu' ? 'navigation-active' : '' }}">
                            <span>{{ $menu->name }}</span>
                            @if ($menus->where('parent_id', $menu->id)->count() > 0)
                                <span class="group-hover:rotate-90 transition-all duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-3">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </span>
                            @endif
                        </a>
                        @if ($menus->where('parent_id', $menu->id)->count() > 0)
                            <ul
                                class="absolute z-50 top-7 -left-5 translate-y-10 opacity-0 pointer-events-none group-hover:translate-y-5 group-hover:pointer-events-auto  group-hover:opacity-100 transition-all duration-150 bg-white px-5 py-1 md:min-w-[170px] rounded-b-lg shadow-md">
                                @foreach ($menus->where('parent_id', $menu->id) as $submenu)
                                    <li>
                                        <a href="{{ $submenu->slug }}"
                                            class="py-1 inline-block hover:text-blue-500 w-full truncate">{{ $submenu->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
            <div class="flex gap-3 select-none py-4">
                <div class="flex gap-2">
                    <span class="text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </span>
                    <span>Mở cửa từ thứ 2 đến thứ 7 hằng tuần</span>
                </div>
                <div class="text-gray-500/50">|</div>
                <span class="text-gray-500">8:00 - 17:00</span>
            </div>
        </div>
    @endif
@endif
