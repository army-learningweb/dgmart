@if (isset($menus))
    @if ($menus->count() > 0)
        <div class="md:px-3 rounded-xl md:flex justify-between items-center absolute md:relative top-10 left-0 md:top-0 z-50 w-full md:w-fit  res-menu hidden">
            <ul class="md:flex flex-col md:flex-row md:gap-7 bg-white px-5 pb-3 md:pb-0 md:px-0 mt-[20px] md:mt-0 w-full shadow-sm md:shadow-none">
                @foreach ($menus->where('parent_id', 0) as $menu)
                    <li class="relative group md:border-0">
                        <a href="{{ url($menu->slug == 'trang/cua-hang' ? '/' : $menu->slug) }}"
                            class="group-hover:text-blue-600 hover:text-blue-600 flex items-center gap-1 md:py-5 py-2
                            {{ $menu->slug == 'trang/cua-hang' && session('client_module_active') == '' ? 'navigation-active' : '' }}
                            {{ session('client_module_active') == $menu->slug && session('client_sub_module_active') == '' ? 'navigation-active' : '' }}
                            {{ request()->path() == $menu->slug ? 'navigation-active' : '' }}">
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
        </div>
    @endif
@endif
