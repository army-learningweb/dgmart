<x-client-layout>

    <div class="animate_reveal flex gap-2 items-center py-3">
        <x-client-breadcrum />
    </div>

    <div class="mt-5 max-w-7xl mx-auto flex gap-20 animate_reveal">
        <div class="w-[55%]">
            <div class="sticky top-8">
                <div
                    class="animate_reveal text-5xl font-bold tracking-tight bg-gradient-to-r from-blue-600 to-blue-900 bg-clip-text text-transparent py-3 w-full">
                    <div class="transition-all duration-500 client-product-name">
                        {{ $product_info->name }}
                    </div>
                </div>
                <div class="mt-2">
                    <img src="{{ asset($product_info->medias[0]->url) }}" alt=""
                        class="w-full h-[450px] object-cover">
                    <div class="absolute w-full top-[50%]">
                        <x-button.button-slider size="7" class="w-full justify-between" />
                    </div>
                </div>

            </div>

        </div>
        <div class="flex-1 space-y-2">
            @php
                for ($i = 0; $i<=10; $i++){
                    $animate_time[$i] = $i * 0.1;
                }
            @endphp
            <div class="flex gap-2 justify-between items-center p-4 bg-gray-100 rounded-xl animate_reveal" style="animation-deplay: {{$animate_time[0]}}s">
                @if ($product_info->quantity > 0)
                    <p class="font-semibold">Tình trạng sản phẩm </p>
                    <div class="px-4 py-[5px] bg-green-500/10 text-green-500 font-semibold w-fit rounded-lg">Còn hàng
                    </div>
                @else
                    <div class="px-4 py-[5px] bg-red-500/10 text-red-500 font-semibold w-fit rounded-lg">Hết hàng
                    </div>
                @endif
            </div>

            <div class="p-4 rounded-xl bg-gray-100 flex justify-between items-center animate_reveal"  style="animation-delay:{{ $animate_time[1]}}s">
                <div class="w-[70%] font-semibold">Mô tả ngắn</div>
                <div class="flex-1">
                    {{ $product_info->desc }}
                </div>
            </div>

            <div class="flex justify-between items-center p-4 bg-gray-100 rounded-xl animate_reveal" style="animation-delay:{{ $animate_time[2]}}s">
                <div class="font-semibold">Đánh giá</div>
                <div class="flex flex-col gap-1 items-end">
                    <div class="flex gap-1">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-7 text-amber-500">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                    clip-rule="evenodd" />
                            </svg>
                        @endfor
                    </div>

                    <span class="ms-3">(n) Lượt đánh giá</span>
                </div>
            </div>

            <div class="p-4 border border-gray-300 rounded-xl flex justify-between items-center animate_reveal" style="animation-delay:{{ $animate_time[3]}}s">
                <div class="font-semibold text-xl">Giá</div>
                <div>
                    @if ($product_info->price_sale_off != null)
                        <div class="flex gap-2 my-2">
                            <div class="text-gray-900 text-3xl font-semibold">
                                {{ num_format($product_info->price_sale_off) }}</div>
                            <div class="text-gray-500 line-through text-lg">{{ num_format($product_info->price) }}</div>
                        </div>
                    @else
                        <div class="text-lg font-semibold my-2">{{ num_format($product_info->price) }}</div>
                    @endif
                </div>
            </div>

            <div class="animate_reveal" style="animation-delay:{{ $animate_time[4]}}s">
                <div class="mt-3 p-4 bg-gray-100 rounded-xl">
                    <div class="font-semibold text-[16px]">
                        Chi tiết sản phẩm
                    </div>
                    <div class="client-product-details mt-5">
                        {!! $product_info->details !!}
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-1 py-1 animate_reveal" style="animation-delay: {{ $animate_time[5] }}s">
                <a href="javascript:history.back()" class="px-3 py-2 bg-gradient-to-r from-gray-500 to-gray-600 rounded-md text-white hover:brightness-125 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                    <span>Quay về</span>
                </a>
                <button class="bg-gradient-to-r flex gap-2 items-center from-blue-600 to-blue-800 text-white px-5 py-2 rounded-md hover:brightness-125 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                    <span>Thêm sản phẩm vào giỏ hàng</span>
                </button>
            </div>

        </div>
    </div>

</x-client-layout>
