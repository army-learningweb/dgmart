<x-client-layout>

    <div class="flex items-start gap-4 mt-3">
        {{-- category --}}
        <div class="bg-white shadow-md p-5 rounded-2xl flex-1">
            <div class="mt-3">
                <h1 class="font-semibold text-[16px]">Tìm kiếm</h1>
                <div class="flex items-center gap-2 border-gray-500/30 rounded-md border px-2 mt-2">
                    <input type="search" name="client-search-product" id="client-search-product"
                        placeholder="Bạn tìm sản phẩm gì ?"
                        class="client-search-product border-none py-[7px] px-0 text-sm w-full focus:border-0 focus:outline-0 focus:ring-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="text-gray-500/50 size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </div>
            </div>
            <hr class="my-3">
            <h1 class="font-semibold text-[16px]">Sản phẩm</h1>
            <ul class="mt-3">
                <li class="group">
                    <label for="category-product-all" class="flex items-center justify-between py-2 cursor-pointer">
                        <div class="group-hover:text-blue-600">
                            Tất cả
                        </div>
                        <input type="radio" name="category" id="category-product-all" value=""
                            class="category-product-filter border-gray-500/50" checked>
                    </label>
                </li>
                @foreach ($products_categories as $item)
                    <li class="group">
                        <label for="category-product-{{ $item->id }}"
                            class="flex items-center justify-between py-2 cursor-pointer">
                            <div class="group-hover:text-blue-600">
                                {{ $item->name }}
                            </div>
                            <input type="radio" name="category" id="category-product-{{ $item->id }}"
                                value="{{ $item->id }}" class="category-product-filter border-gray-500/50"
                                data-name={{ $item->name }} data-url="{{ request()->path() }}">
                        </label>
                    </li>
                @endforeach
            </ul>
            <hr class="my-3">
            <div class="type-products">
               
            </div>

            <h1 class="font-semibold text-[16px]">Theo giá</h1>
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
                        <input type="radio" name="order-price" id="order-base" value="" checked
                            class="order-price-product border-gray-500/50" data-parent="">
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
                            class="order-price-product border-gray-500/50" data-parent="">
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
                            class="order-price-product border-gray-500/50">
                    </label>
                </li>
            </ul>
        </div>

        {{-- product --}}
        <div class="rounded-xl w-[77%] client-list-products">
            @include('client.product.partials.list')
        </div>
    </div>

</x-client-layout>
