<x-client-layout>
    <div class="flex items-start gap-4 mt-4">
        <div class="bg-white shadow-md p-5 rounded-2xl flex-1 sticky top-4">
            <a href="{{ url('san-pham.html') }}"
                class="flex gap-2 items-center text-gray-500 hover:underline hover:text-gray-800 underline-offset-1 py-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                <span>Quay lại sản phẩm</span>
            </a>
            <hr class="my-3">
            <div class="flex gap-2 items-center bg-blue-600/10 p-2 rounded-lg text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                    <path fill-rule="evenodd"
                        d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z"
                        clip-rule="evenodd" />
                </svg>

                <h1 class="font-semibold text-[16px]">{{ $title }}</h1>
            </div>
            <hr class="my-3">

            <a href="{{ url(request()->path()) }}" class="reset-filter hidden">
                <div class="reset-filter bg-gray-300/50 p-2 rounded-lg flex gap-2 items-center justify-center hover:bg-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                Reset tùy chọn
                </div>

                <hr class="my-3">
            </a>


            {{-- filter --}}
            <div class="flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                </svg>
                <h1 class="font-semibold text-[16px]">Lọc theo loại</h1>
            </div>
            <ul class="mt-3">
                <li class="group">
                    <label for="all" class="flex items-center justify-between py-2 cursor-pointer">
                        <div class="group-hover:text-blue-600">
                            Tất cả
                        </div>
                        <input type="radio" name="cateogry" id="all" value="all" checked
                            class="category-filter border-gray-500/50" data-url="{{ request()->path() }}"
                            data-parent="{{ session('parent_category_id') }}">
                    </label>
                </li>
                @foreach ($categories as $item)
                    <li class="group">
                        <label for="cateogry_{{ $item->id }}"
                            class="flex items-center justify-between py-2 cursor-pointer">
                            <div class="group-hover:text-blue-600">
                                {{ $item->name }}
                            </div>
                            <input type="radio" name="cateogry" id="cateogry_{{ $item->id }}"
                                value="{{ $item->id }}" class="category-filter border-gray-500/50"
                                data-name={{ $item->name }} data-url="{{ request()->path() }}">
                        </label>
                    </li>
                @endforeach
            </ul>
            <hr class="my-3">
            <div class="">
                <div class="flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                    </svg>
                    <h1 class="font-semibold text-[16px]">Sắp xếp theo giá</h1>
                </div>

                <ul class="mt-3">
                    <li class="group">
                        <label for="order-base" class="flex items-center justify-between py-2 cursor-pointer">
                            <div class="flex gap-2 items-center group-hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                                <span>Mặc định</span>
                            </div>
                            <input type="radio" name="order-price" id="order-base" value="base" checked
                                class="order-filter border-gray-500/50" data-url="{{ request()->path() }}"
                                data-parent="{{ session('parent_category_id') }}">
                        </label>
                    </li>
                    <li class="group">
                        <label for="order-desc" class="flex items-center justify-between py-2 cursor-pointer">
                            <div class="flex gap-2 items-center group-hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 4.5h14.25M3 9h9.75M3 13.5h9.75m4.5-4.5v12m0 0-3.75-3.75M17.25 21 21 17.25" />
                                </svg>
                                <span>Từ cao đến thấp</span>
                            </div>
                            <input type="radio" name="order-price" id="order-desc" value="desc"
                                class="order-filter border-gray-500/50" data-url="{{ request()->path() }}"
                                data-parent="{{ session('parent_category_id') }}">
                        </label>
                    </li>
                    <li class="group">
                        <label for="order-asc" class="flex items-center justify-between py-2 cursor-pointer">
                            <div class="flex gap-2 items-center group-hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12" />
                                </svg>
                                <span>Từ thấp đến cao</span>
                            </div>
                            <input type="radio" name="order-price" id="order-asc" value="asc"
                                class="order-filter border-gray-500/50" data-url="{{ request()->path() }}"
                                data-parent="{{ session('parent_category_id') }}">
                        </label>
                    </li>
                </ul>
            </div>
            <hr class="my-3">
            <div class="mt-5">
                <img src="{{ asset('images/ads.webp') }}" alt="" class="rounded-2xl">
            </div>
        </div>

        {{-- product --}}
        <div class="rounded-xl w-[80%] client-list-products">
            @include('client.product.partials.list')
        </div>
    </div>

</x-client-layout>
