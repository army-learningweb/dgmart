@if (Cart::count() > 0)
    <div class="md:mt-10 p-4 shadow-md md:rounded-2xl bg-white">
        <div class="overflow-x-auto">
            <table class="min-w-[1150px] md:w-full select-none">
                <tr class="font-semibold rounded-2xl border-b border-gray-200">
                    <td class="px-5 py-4">Sản phẩm</td>
                    <td class="px-2">Cấu hình</td>
                    <td class="px-5 text-center">Giá cấu hình</td>
                    <td class="px-5 text-center">Giá cơ bản</td>
                    <td class="px-5 text-center">Số lượng</td>
                    <td class="px-5 text-center">Thành tiền</td>
                    <td class="px-10">Xoá</td>
                </tr>
                @foreach ($carts as $items)
                    <tr class="border-b border-gray-100">
                        <td class="pr-5 py-5">
                            <div class="flex items-center gap-5">
                                <img src="{{ $items->options->image }}" alt="" class="w-28 h-28 object-contain">
                                <span class="text-wrap w-[100px]">{{ $items->name }}</span>
                            </div>
                        </td>
                        <td class="px-2 py-5">
                            @if ($items->options->variants)
                                <div class="flex flex-col gap-1 text-xs">
                                    @foreach ($items->options->variants as $item)
                                        <div>
                                            <span class="font-semibold">{{ $item->slug }} :</span>
                                            <span class="">{{ $item->name }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="italic text-gray-400">Không</div>
                            @endif
                        </td>
                        <td class="px-5 text-center">
                            @if ($items->options->price_accesories)
                                {{ num_format($items->options->price_accesories) }}
                            @else
                                <div class="italic text-gray-400">Không</div>
                            @endif
                        </td>
                        <td class="px-5 text-center">
                            <div class="flex flex-col gap-1 relative">
                                @if ($items->options->sale_off > 0)
                                    <span
                                        class="absolute rotate-6 -top-5 -right-1 bg-red-500/10 text-red-600 px-2 py-[3px] rounded-md text-xs font-semibold">
                                        Giảm {{ $items->options->sale_off }}%
                                    </span>
                                    <del class="text-gray-500">{{ num_format($items->options->base_price) }}</del>
                                    <span>{{ num_format($items->options->price_sale_off) }}</span>
                                @else
                                    <span>{{ num_format($items->options->base_price) }}</span>
                                @endif

                            </div>
                        </td>
                        <td class="px-5 text-center">
                            <div class="flex justify-between items-center select-auto">
                                <div class="cart-change-qty bg-blue-600/10 p-1 rounded-md" action="decrease"
                                    data-row-id="{{ $items->rowId }}" data-stock={{ $items->options->stock }}>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="size-5 cursor-pointer hover:text-blue-600 active:text-blue-800">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                    </svg>
                                </div>
                                <div class="w-[60px] border border-gray-200 px-5 py-[3px] rounded-md item-{{ $items->rowId }}"
                                    data-qty="{{ $items->qty }}">{{ $items->qty }}
                                </div>
                                <div class="cart-change-qty bg-blue-600/10 p-1 rounded-md" action="increase"
                                    data-row-id="{{ $items->rowId }}" data-stock={{ $items->options->stock }}>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="size-5 cursor-pointer hover:text-blue-600 active:text-blue-800">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 text-center font-semibold price text-green-700">
                            <div class="w-[100px] price" data-row-id="{{ $items->rowId }}">
                                {{ num_format($items->price * $items->qty) }}
                            </div>


                        </td>
                        <td class="px-10">
                            <a href="{{ route('gio-hang.remove', $items->rowId) }}"
                                onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này ra khỏi giỏ hàng')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="size-5 text-red-700 hover:text-red-500 cursor-pointer ms-1">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>


        <div class="flex justify-between items-center gap-7 px-3 mt-5">
            <div class="flex-1 flex flex-col gap-3 mt-3">
            </div>

            <div class="w-[70%] md:w-[20%] flex flex-col justify-end gap-2">
                <div class="flex justify-between items-center">
                    <span class=" text-md">Vận chuyển:</span>
                    <span class="font-semibold text-lg">Miễn phí !</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-md">Số lượng:</span>
                    <span class="font-semibold text-xl cart-qty">x{{ Cart::count() }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-md">Tổng tiền:</span>
                    <span class="font-semibold text-xl total-price text-green-700">{{ Cart::total() }}đ</span>
                </div>
            </div>
        </div>

        <hr class="my-5">

        <div class="flex justify-end md:justify-between items-center gap-2">
            <div class="md:flex gap-1 items-center hidden">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4 text-blue-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>

                <a href="/" class="text-blue-600 hover:underline underline-offset-1">Tiếp tục
                    mua sắm</a>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('gio-hang.destroy') }}"
                    class="bg-gradient-to-r flex gap-2 items-center from-red-600 to-red-800 text-white px-5 py-2 rounded-md hover:brightness-125 cursor-pointer">Xóa
                    toàn bộ</a>
                <a href="{{ route('thanh-toan') }}"
                    class="bg-gradient-to-r flex gap-2 items-center from-blue-600 to-blue-800 text-white px-5 py-2 rounded-md hover:brightness-125 cursor-pointer">
                    <span>Tiến hành thanh toán</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
            </div>

        </div>
    </div>
@else
    @include('client.cart.partials.empty_cart')
@endif
