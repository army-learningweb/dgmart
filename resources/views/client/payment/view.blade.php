<x-client-layout>

    <x-flash-session.success-flash-session />

    <div class="pt-3 animate_reveal">
        <div class="flex justify-between items-end">
            <a href="{{ url(request()->path()) }}"
                class="text-6xl font-bold tracking-tight bg-gradient-to-r from-blue-600 to-blue-900 bg-clip-text text-transparent py-3">
                Thanh toán
            </a>
        </div>
    </div>

    <div class="flex items-start gap-3 mt-5 animate_reveal">

        <div class="bg-white p-5 rounded-xl shadow-md w-[48%]">
            <form action="{{ route('thanh-toan.create') }}" method="post">
                @csrf

                    <h1 class="font-semibold text-lg">Thông tin cá nhân</h1>
                    <hr class="my-3">

                    <div class="mt-2">
                        <x-input-field.field label="Họ và tên" type="text" name="name" id="name"
                            required="*" value="{{ Cookie::get('name') }}"/>
                    </div>
                    
                    <div class="mt-2">
                        <x-input-field.field label="Số điện thoại" type="text" name="tel" id="tel"
                            required="*" value="{{ Cookie::get('tel') }}"/>
                    </div>

                    <div class="mt-2">
                        <x-input-field.field label="Email" type="text" name="email" id="email"
                        required="*" value="{{ Cookie::get('email') }}"/>
                    </div>

                    <div class="mt-2">
                        <x-form-element.text-area label="Địa chỉ giao hàng" name="address" id="address" 
                        required="*" class="h-[96px]" value="{{ Cookie::get('address') }}"/>
                    </div>
                    
                    <div class="mt-2">
                        <x-form-element.text-area label="Ghi chú" name="note" id="note" class="h-[96px]" />
                    </div>

                <hr class="my-3">
                <h1 class="font-semibold text-lg">Phương thức thanh toán</h1>

                <div class="flex gap-3 mt-3">
                    <div class="w-full md:w-[49%] p-5 relative border rounded-md shadow-sm flex items-center">
                        <input type="radio" name="payment_method" id="cod" value="cod" checked
                            {{ old('payment_method') == 'cod' ? 'checked' : '' }} class="payment_method">
                        <label for="cod"
                            class="flex items-center absolute cursor-pointer -right-0 top-0 h-full w-full justify-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 text-green-700">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                            </svg>
                            Tiền mặt
                        </label>
                    </div>
                    <div class="w-full md:w-[49%] p-4 relative border rounded-md shadow-sm flex items-center">
                        <input type="radio" name="payment_method" id="momo" class="payment_method" value="momo"
                            {{ old('payment_method') == 'momo' ? 'checked' : '' }}>
                        <label for="momo"
                            class="flex items-center absolute cursor-pointer -right-0 top-0 h-full w-full justify-center">
                            <img src="{{ asset('images/logo-momo.webp') }}" alt=""
                                class="w-[30px] mx-3 rounded-lg"> Ví
                            MoMo
                        </label>
                    </div>
                </div>

                <div class="flex gap-3 mt-3">
                    <div class="w-full md:w-[49%] p-5 relative border rounded-md shadow-sm flex items-center">
                        <input type="radio" name="payment_method" id="zalo" class="payment_method" value="zalo"
                            {{ old('payment_method') == 'zalo' ? 'checked' : '' }}>
                        <label for="zalo"
                            class="flex items-center absolute cursor-pointer -right-0 top-0 h-full w-full justify-center">
                            <img src="{{ asset('images/zalopay.png') }}" alt=""
                                class="w-[40px] mx-3 rounded-lg">
                            ZaloPay
                        </label>
                    </div>
                    <div class="w-full md:w-[49%] p-4 relative border rounded-md shadow-sm flex items-center">
                        <input type="radio" name="payment_method" id="banking" class="payment_method"
                            value="banking" {{ old('payment_method') == 'banking' ? 'checked' : '' }}>
                        <label for="banking"
                            class="flex items-center absolute cursor-pointer -right-0 top-0 h-full w-full justify-center">
                            <img src="{{ asset('images/vietcombank.jpg') }}" alt=""
                                class="w-[30px] mx-3 rounded-lg">
                            Vietcombank
                        </label>
                    </div>
                </div>

                <div class="flex justify-end mt-5 items-center gap-5">
                    <a href="/" class="text-blue-600 hover:underline underline-offset-1">Tiếp tục mua sắm</a>
                    <button type="submit"
                        class="bg-gradient-to-r flex gap-2 items-center from-blue-600 to-blue-800 text-white px-5 py-2 rounded-md hover:brightness-125 cursor-pointer">
                        <span class="font-semibold">ĐẶT HÀNG</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
                        </svg>

                    </button>
                </div>

                @foreach ($carts as $item)
                    <input type="hidden" name="product_ids[]" value="{{ $item->id }}">
                @endforeach
            </form>
        </div>

        <div class="flex-1 bg-white p-5 rounded-xl shadow-md sticky top-4">

            <h1 class="font-semibold text-lg">Đơn hàng</h1>
            <hr class="my-3">
            <table class="w-full">
                @foreach ($carts as $items)
                    <tr class="border-b border-gray-100">
                        <td class="px-2 py-2"><img src="{{ $items->options->image }}" alt="" class="w-20">
                        </td>
                        <td class="px-2 py-2">
                            <div class="w-[200px] text-wrap">
                                {{ $items->name }}
                            </div>
                            <div class="italic text-gray-500 text-xs">(Đã bao gồm cấu hình)</div>
                        </td>
                        <td class="px-2 py-2">
                            <div class="flex gap-1 items-center text-blue-600 relative {{ $items->options->variants ? 'group' : '' }}">

                                @if ($items->options->variants)
                                    <div class="text-xs cursor-pointer">Xem cấu hình</div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-3">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                @else
                                    <div class="text-gray-300 select-none">.....</div>
                                @endif

                                <div
                                    class="absolute bg-white shadow-lg p-5 min-w-[290px] rounded-xl top-0 left-0 translate-y-7 z-50 text-black hidden group-hover:block animate_variant_translate_down">
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
                                        <div class="italic text-gray-400 text-center">...</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-2 py-2 font-semibold">(x{{ $items->qty }})</td>
                        <td class="pl-10 py-2 font-semobold">{{ num_format($items->price * $items->qty) }}</td>
                    </tr>
                @endforeach
            </table>
            <div class="flex justify-between mt-5 px-2">
                <div class="flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                    </svg>
                    <span class="font-semibold">Miễn phí vận chuyển !</span>
                </div>
                <div class="flex gap-5 items-center">
                    <span>Tổng thanh toán:</span>
                    <span class="font-semibold text-xl">{{ Cart::total() }}đ</span>
                </div>
            </div>
        </div>
    </div>

</x-client-layout>
