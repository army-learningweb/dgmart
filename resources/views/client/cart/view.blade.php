<x-client-layout>

    <x-flash-session.success-flash-session />
    
    <div class="pt-3 animate_reveal">
        <div class="flex justify-between items-end">
            <a href="{{ url(request()->path()) }}"
                class="text-6xl font-bold tracking-tight bg-gradient-to-r from-blue-600 to-blue-900 bg-clip-text text-transparent py-3">
                Giỏ hàng
            </a>
            @if ($top_sale && Cart::count() > 0)
                <div class="flex flex-col gap-2 items-end">
                    <h1 class="font-[500] client-total-products text-3xl flex gap-2 items-center tracking-tight">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-7 text-amber-500">
                            <path fill-rule="evenodd"
                                d="M12.963 2.286a.75.75 0 0 0-1.071-.136 9.742 9.742 0 0 0-3.539 6.176 7.547 7.547 0 0 1-1.705-1.715.75.75 0 0 0-1.152-.082A9 9 0 1 0 15.68 4.534a7.46 7.46 0 0 1-2.717-2.248ZM15.75 14.25a3.75 3.75 0 1 1-7.313-1.172c.628.465 1.35.81 2.133 1a5.99 5.99 0 0 1 1.925-3.546 3.75 3.75 0 0 1 3.255 3.718Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="bg-gradient-to-r from-amber-500 to-red-600 bg-clip-text text-transparent py-1">Khám phá
                            ngay
                            - Sale sốc {{ $top_sale->sale_off }}%</span>
                    </h1>
                    <div class="flex gap-5 items-end">
                        <span class="font-semibold text-xl">{{ $top_sale->name }}</span>
                        <a href="{{ url($top_sale->slug) }}"
                            class="inline-flex mb-[2px] items-center gap-1 text-blue-600 group">
                            <span>Xem ngay</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-5 mt-1 group-hover:translate-x-1 transition-all duration-150">
                                <path fill-rule="evenodd"
                                    d="M12.97 3.97a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06l6.22-6.22H3a.75.75 0 0 1 0-1.5h16.19l-6.22-6.22a.75.75 0 0 1 0-1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @if (Cart::count() > 0)
    <div class="mt-10 p-4 shadow-md rounded-2xl bg-white animate_reveal">
        <table class="md:w-full ">
            <tr class="font-semibold rounded-2xl border-b border-gray-200">
                <td class="px-5 py-4">Sản phẩm</td>
                <td class="px-2">Cấu hình</td>
                <td class="px-5 text-center">Giá cấu hình</td>
                <td class="px-5 text-center">Giá máy cơ bản</td>
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
                        <input type="number" name="" id="" value="{{ $items->qty }}"
                            class="cart-increase-qty w-[70px] rounded-lg border-gray-200 [&::-webkit-inner-spin-button]:opacity-100 [&::-webkit-inner-spin-button]:block cursor-pointer"
                            min="1" max="{{ $items->options->stock }}" data-row-id="{{ $items->rowId }}">
                    </td>
                    <td class="px-5 text-center font-semibold price text-green-700" data-row-id="{{ $items->rowId }}">{{ num_format($items->price * $items->qty) }}</td>
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

        <div class="flex justify-between items-center gap-7 px-3">
            <div class="flex-1 flex flex-col gap-3 mt-3">
                <h1 class="bg-gradient-to-r from-gray-600 to-gray-900 bg-clip-text text-transparent font-bold text-2xl py-1">
                    Ưu đãi giảm giá cho thành viên !
                </h1>
                <div>Bạn chưa là thành viên ? <a href="" class="text-blue-600 hover:underline underline-offset-1">Đăng ký ngay</a></div>
                <form action="" method="post" class="flex gap-2">
                    <input type="text" name="" id="" placeholder="Nhập mã giảm giá tại đây" class="border-gray-300 rounded-md text-xs w-[200px] placeholder:italic">
                    <button class="flex gap-2 items-center border border-blue-600 text-blue-600 hover:bg-gradient-to-r hover:from-blue-500 hover:to-blue-800 px-5 hover:text-white hover:border-none rounded-md py-[3px] text-[14px] hover:brightness-110 active:brightness-125">
                        
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                            </svg>
                        
                        <span>Áp dụng</span>
                    </button>
                </form>
            </div>

            <div class="w-[20%] flex flex-col justify-end gap-2">
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

        <div class="flex justify-end items-center gap-5">
             <a href="/" class="text-blue-600 hover:underline underline-offset-1">Tiếp tục mua sắm</a>
            <a href="{{ route('thanh-toan') }}" class="bg-gradient-to-r flex gap-2 items-center from-blue-600 to-blue-800 text-white px-5 py-2 rounded-md hover:brightness-125 cursor-pointer">
                <span>Tiến hành thanh toán</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </a>
        </div>
    </div>

    @if (Cart::count() > 0)
        {{-- accessories --}}
        <div class="mt-5 py-3">
            <x-slider-product.list :products="$accesories_product" target="accesories-product" title="Phụ kiện đi kèm" />
        </div>
    @endif

    @else
    <div class="relative animate_reveal">
        <img src="{{asset('images/emptycart.svg')}}" alt="" class="w-full h-[350px]">
        <div class="absolute right-[10%] top-[30%] flex flex-col gap-2">
            <div class="text-lg italic">Giỏ hàng của bạn trống trơn !</div>
            <a href="/" class="px-5 py-[7px] bg-gradient-to-r from-blue-600 to-blue-900 text-white rounded-md text-md w-fit hover:brightness-110 active:brightness-125">Mua sắm ngay</a>
        </div>
    </div>
        
    @endif
    
</x-client-layout>
