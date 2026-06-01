    <ul id="main-menu">
        <li>
            <a href="{{ route('dashboard') }}"
                class="{{ session('module_active') == 'dashboard' ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-lg text-gray-900 hover:bg-white hover:shadow-md hover:text-blue-600">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                </span>
                <span>
                    Dashboard
                </span>
            </a>
        </li>

        <li class="mt-1">
            <a href="#"
                class="{{ session('module_active') == 'products' ? 'active' : '' }} flex items-center justify-between gap-3 px-3 py-2 rounded-lg text-gray-900 hover:bg-white hover:shadow-md hover:text-blue-600">
                <div class="flex gap-3">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                        </svg>
                    </span>
                    <span>
                        Sản phẩm
                    </span>
                </div>
                <span class="arrow-down">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </span>
            </a>
            <ul class="sub-menu rounded-lg {{ session('module_active') == 'products' ? 'block' : 'hidden' }}">
                <li class="mt-1">
                    <a href="{{ route('admin.products.variants') }}"
                        class="ms-1 {{ session('module_active') == 'products' && session('sub_module_active') == 'variants' ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-lg text-gray-900 hover:bg-white hover:shadow-md hover:text-blue-600">
                        <span>
                            └
                        </span>
                        <span>
                            Thông số
                        </span>
                    </a>
                </li>
                <li class="mt-1">
                    <a href="{{ route('admin.products.attributes') }}"
                        class="ms-1 {{ session('module_active') == 'products' && session('sub_module_active') == 'attributes' ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-lg text-gray-900 hover:bg-white hover:shadow-md hover:text-blue-600">
                        <span>
                            └
                        </span>
                        <span>
                            Cấu hình
                        </span>
                    </a>
                </li>
                <li class="mt-1">
                    <a href="{{ route('admin.products') }}"
                        class="ms-1 {{ session('module_active') == 'products' && session('sub_module_active') == '' ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-lg text-gray-900 hover:bg-white hover:shadow-md hover:text-blue-600">
                        <span>
                            └
                        </span>
                        <span>
                            Danh sách
                        </span>
                    </a>
                </li>
                <li class="mt-1">
                    <a href="{{ route('admin.products.categories') }}"
                        class="ms-1 {{ session('module_active') == 'products' && session('sub_module_active') == 'categories' ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-lg text-gray-900 hover:bg-white hover:shadow-md hover:text-blue-600">
                        <span>
                            └
                        </span>
                        <span>
                            Danh mục
                        </span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="mt-1">
            <a href="#"
                class="{{ session('module_active') == 'posts' ? 'active' : '' }} flex items-center justify-between px-3 py-2 rounded-lg text-gray-900 hover:bg-white hover:shadow-md hover:text-blue-600">
                <div class="flex gap-3 items-center">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                    </span>
                    <span>
                        Bài viết
                    </span>
                </div>

                <span class="arrow-down">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </span>
            </a>
            <ul class="sub-menu rounded-lg {{ session('module_active') == 'posts' ? 'block' : 'hidden' }}">
                <li class="mt-1">
                    <a href="{{ route('admin.posts') }}"
                        class="ms-1 {{ session('module_active') == 'posts' && session('sub_module_active') == '' ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-lg text-gray-900 hover:bg-white hover:shadow-md hover:text-blue-600">
                        <span>
                            └
                        </span>
                        <span>
                            Danh sách
                        </span>
                    </a>
                </li>
                <li class="mt-1">
                    <a href="{{ route('admin.posts.categories') }}"
                        class="ms-1 {{ session('module_active') == 'posts' && session('sub_module_active') == 'categories' ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-lg text-gray-900 hover:bg-white hover:shadow-md hover:text-blue-600">
                        <span>
                            └
                        </span>
                        <span>
                            Danh mục
                        </span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="mt-1">
            <a href="{{ route('admin.reviews') }}"
                class="{{ session('module_active') == 'reviews' ? 'active' : '' }} flex items-center justify-between px-3 py-2 rounded-lg text-gray-900 hover:bg-white hover:shadow-md hover:text-blue-600">
                <div class="flex gap-3 items-center">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                        </svg>

                    </span>
                    <span>
                        Đánh giá
                    </span>
                </div>
            </a>
        </li>

        <li class="mt-1">
            <a href="{{ route('admin.menus') }}"
                class="{{ session('module_active') == 'menus' ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-lg text-gray-900 hover:bg-white hover:shadow-md hover:text-blue-600">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </span>
                <span>
                    Menu
                </span>
            </a>
        </li>

        <li class="mt-1">
            <a href="{{ route('admin.sliders') }}"
                class="{{ session('module_active') == 'sliders' ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-lg text-gray-900 hover:bg-white hover:shadow-md hover:text-blue-600">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                    </svg>
                </span>
                <span>
                    Slider
                </span>
            </a>
        </li>

        <li class="mt-1">
            <a href="{{ route('admin.orders') }}"
                class="{{ session('module_active') == 'orders' ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-lg text-gray-900 hover:bg-white hover:shadow-md hover:text-blue-600">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                    </svg>
                </span>
                <span>
                    Đơn hàng
                </span>
            </a>
        </li>

        <hr class="my-3 border-dashed border-gray-500/50">
        <li class="mt-1">
            <a href="{{ route('admin.users') }}"
                class="{{ session('module_active') == 'users' ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-lg text-gray-900 hover:bg-white hover:shadow-md hover:text-blue-600">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                </span>
                <span>
                    Thành viên
                </span>
            </a>
        </li>

        <li class="mt-1">
            <a href="{{ route('admin.roles') }}"
                class="{{ session('module_active') == 'roles' ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-lg text-gray-900 hover:bg-white hover:shadow-md hover:text-blue-600">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                    </svg>
                </span>
                <span>
                    Vai trò
                </span>
            </a>
        </li>

        <li class="mt-1">
            <a href="{{ route('admin.permissions') }}"
                class="{{ session('module_active') == 'permissions' ? 'active light-active' : '' }} flex items-center gap-3 px-3 py-2 rounded-lg text-gray-900 hover:bg-white hover:shadow-md hover:text-blue-600">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                    </svg>
                </span>
                <span>
                    Quyền
                </span>
            </a>
        </li>
        <hr class="my-3 border-dashed border-gray-500/50">
        <li class="mt-1">
            <a href="{{ route('admin.trashs') }}"
                class="{{ session('module_active') == 'trashs' ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-lg text-gray-900 hover:bg-white hover:shadow-md hover:text-blue-600">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </span>
                <span>
                    File rác
                </span>
            </a>
        </li>
    </ul>
