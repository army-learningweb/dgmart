<x-client-layout>
    <div
        class="animate_reveal text-4xl font-bold tracking-tight bg-gradient-to-r from-blue-600 to-blue-900 bg-clip-text text-transparent w-full py-5 mt-3">
        <div class="transition-all duration-500 client-product-name">
            {{ $product_info->name }}
        </div>
    </div>

    <div class="mt-5 max-w-7xl mx-auto flex gap-5 animate_reveal">
        <div class="w-[50%]">
            <div class="sticky top-14 flex flex-col items-center">
                <div class="relative overflow-hidden border border-gray-200 rounded-3xl bg-white w-full">
                    <ul class="container-image flex flex-nowrap gap-3 py-5 w-full transition-all duration-200">
                        @foreach ($product_info->medias as $item)
                            @if ($item->is_main != 0)
                                <li class="shrink-0 w-full">
                                    <img src="{{ asset($item->url) }}" alt=""
                                        class="image-detail w-full h-[450px] object-contain">
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                @if (count($product_info->medias) > 2)
                    <div class="relative w-full flex flex-col items-center">
                        <div class="dot-img flex justify-center gap-2 py-5 w-full">
                            <div class="flex gap-2 bg-gray-50 p-3 rounded-2xl">
                                @for ($i = 1; $i <= count($product_info->medias) - 1; $i++)
                                    <div
                                        class="dot-item cursor-pointer bg-gray-500/30 w-2 h-2 rounded-full transition-all duration-200">
                                    </div>
                                @endfor
                            </div>
                        </div>
                        <div class="absolute w-[22%] bottom-6 flex justify-between">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor"
                                class="btn-prev-img size-6 text-gray-500/30 hover:text-gray-600 active:text-gray-900 cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor"
                                class="btn-next-img size-6 text-gray-500/30 hover:text-gray-600 active:text-gray-900 cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </div>
                    </div>
                @endif

            </div>
        </div>
        <form action="{{ route('gio-hang.create') }}" method="post" class="flex-1 ">
            @csrf
            {{-- info --}}
            <div class="space-y-1 h-full flex flex-col gap-2 bg-white py-4 px-10 rounded-2xl border border-gray-200">
                <div class="text-2xl py-2 select-none">
                    <span class="text-gray-500 font-semibold">Thông tin.</span>
                    <span class="font-semibold tracking-tight">Về sản phẩm</span>
                </div>
                <div class="flex gap-2 justify-between items-center py-5 select-none border-b border-gray-200">
                    @if ($product_info->quantity > 0)
                        <p class="font-semibold">Tình trạng</p>
                        <div class="text-green-500 font-semibold w-fit rounded-md">Còn hàng
                        </div>
                    @else
                        <div class="text-red-500 font-semibold w-fit rounded-md">Hết hàng
                        </div>
                    @endif
                </div>

                {{-- code --}}
                <div class="flex justify-between py-5 select-none border-b border-gray-200">
                    <div class="font-semibold">Mã sản phẩm</div>
                    <div class="">{{ $product_info->code }}</div>
                    <input type="hidden" name="product_id" value="{{ $product_info->id }}">
                    <input type="hidden" name="product_img" value="{{ asset($product_info->medias[0]->url) }}">
                </div>

                {{-- desc --}}
                <div class="flex flex-col gap-2 py-5 select-none border-b border-gray-200">
                    <div class="font-semibold w-[30%]">Mô tả ngắn</div>
                    <div class="flex-1">{{ $product_info->desc }}</div>
                </div>

                {{-- customize --}}
                @if ($variants->count() > 0)
                    <div class="pt-5 pb-3 select-none flex items-center justify-between">
                        <div>
                            <span class="text-gray-500 font-semibold text-2xl">Tùy chọn.</span>
                            <span class="font-semibold tracking-tight text-2xl">Cá nhân hóa</span>
                        </div>
                        <div>
                            <div class="flex gap-1 items-end text-blue-600 hover:underline cursor-pointer show-config">
                                <span>Tùy chọn thêm tại đây</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="product-details-config hidden">
                        <div class="flex flex-col gap-3 animate_reveal">
                            @foreach ($variants as $key => $items)
                                <div
                                    class="next-variant text-[16px] tracking-tight flex gap-2 items-center py-3 select-none">
                                    <div class="text-gray-400">Chọn.</div>
                                    <div class="text-lg font-semibold">{{ $key }}</div>
                                </div>
                                @foreach ($items as $item)
                                    <label for="variant_id_{{ $item->id }}"
                                        class="variant_item cursor-pointer outline outline-1 outline-gray-200 hover:outline-blue-700 hover:outline-2 flex gap-2 justify-between items-center p-4 rounded-lg select-none"
                                        style="animation-delay: {{ $loop->index * 0.1 }}s"
                                        data-price="{{ $item->price }}" data-name="{{ $item->name }}">
                                        <div class="w-[40%] flex flex-col gap-2">
                                            <div class="font-semibold w-[150px] truncate">{{ $item->name }}</div>
                                            <div>
                                                +{{ number_format($item->price, '0', ',', '.') }}đ
                                            </div>
                                            <input type="radio" name="options[{{ $key }}]"
                                                id="variant_id_{{ $item->id }}"
                                                {{ $item->price == 0 ? 'checked' : '' }} value="{{ $item->id }}"
                                                class="hidden">
                                        </div>
                                        <div class="flex-1 text-gray-400">{{ $item->desc }}</div>
                                    </label>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- baseprice --}}
                <div class="flex justify-between items-center py-5 border-b border-gray-200 select-none">
                    <div class="font-semibold">Giá gốc</div>
                    <div class="font-semibold text-2xl base-price" data-price="{{ $product_info->price }}">
                        {{ num_format($product_info->price) }}
                    </div>
                    <input type="hidden" name="base-price" value={{ $product_info->price }}>
                </div>

                {{-- saleprice --}}
                @if ($product_info->sale_off > 0)
                    <div class="flex justify-between items-center py-5 text-red-500 select-none">
                        <div class="font-semibold">Giảm giá {{ $product_info->sale_off }}%</div>
                        <div class="font-semibold text-2xl price-sale-off"
                            data-price="{{ $product_info->price_sale_off }}">
                            {{ num_format($product_info->price_sale_off) }}
                        </div>
                        <input type="hidden" name="price-sale-off" value={{ $product_info->price_sale_off }}>
                    </div>
                @endif

                {{-- price-accesories --}}
                @if ($variants->count() > 0)
                    <div class="flex justify-between items-center py-5 border-b border-gray-200 select-none">
                        <div class="font-semibold">Phí linh kiện nâng cấp</div>
                        <div class="font-semibold text-2xl price-accesories">0đ</div>
                        <input type="hidden" name="price-accesories" value="">
                    </div>
                @endif

                {{-- total-price --}}
                <div class="flex justify-between items-center py-5 select-none">
                    <div class="font-semibold">Tổng cộng</div>
                    <div class="font-semibold text-2xl total-price">
                        @if ($product_info->sale_off > 0)
                            {{ num_format($product_info->price_sale_off) }}
                        @else
                            {{ num_format($product_info->price) }}
                        @endif
                    </div>
                    <input type="hidden" name="total-price"
                        value="{{ $product_info->sale_off > 0 ? $product_info->price_sale_off : $product_info->price }}">
                </div>

                <div class="flex justify-end gap-5 py-1">
                    <a href="javascript:history.back()"
                        class="rounded-md text-gray hover:brightness-125 flex items-center gap-1 hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg>
                        <span class="select-none">Quay về</span>
                    </a>
                    <button
                        class="bg-gradient-to-r flex gap-2 items-center from-blue-600 to-blue-800 text-white px-5 py-2 rounded-md hover:brightness-125 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span>Thêm vào giỏ</span>
                    </button>
                </div>
            </div>
        </form>
    </div>

    {{-- product --}}
    <div class="mt-5 py-3">
        <x-slider-product.list :products="$more_products" target="more-product" title="Sản phẩm cùng loại" />
    </div>
</x-client-layout>
