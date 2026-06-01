<x-client-layout>
    <div
        class="max-w-7xl mx-auto flex flex-col md:flex-row gap-5 px-4 md:px-0 {{ $errors->any() ? '' : 'animate_reveal' }}">
        <div class="md:w-[50%]">
            <div class="sticky top-14 flex flex-col">
                <div class="relative overflow-hidden border border-gray-200 rounded-3xl bg-white w-full">
                    <ul class="container-image flex flex-nowrap py-5 w-full transition-all duration-200">
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
                        <div class="absolute w-[35%] md:w-[22%] bottom-6 flex justify-between">
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
            <div class="space-y-1 h-fit flex flex-col gap-1 bg-white md:py-4 px-7 rounded-2xl border border-gray-200">

                {{-- code --}}
                <div class="flex justify-between py-5 select-none border-b border-gray-200">
                    <h1
                        class="bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent font-bold text-3xl tracking-tight py-1">
                        {{ $product_info->name }}</h1>
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

                {{-- vote --}}
                <div class="flex justify-between w-full py-5 select-none border-b border-gray-200">
                    <div class="font-semibold">Đánh giá sản phẩm</div>
                    @if ($product_info->vote)
                        <div>({{ $product_info->vote }}) Đánh giá</div>
                    @else
                        <div class="text-gray-400">Chưa có đánh giá</div>
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
                    <div
                        class="pt-5 pb-3 select-none flex flex-col gap-3 md:gap-0 md:flex-row md:items-center justify-between">
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
                        <div class="flex flex-col gap-3 {{ $errors->any() ? '' : 'animate_reveal' }}">
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
                <div class="flex justify-between items-center py-3 border-b border-gray-200 select-none">
                    <div class="font-semibold">Giá gốc</div>
                    <div class="font-semibold text-2xl base-price" data-price="{{ $product_info->price }}">
                        {{ num_format($product_info->price) }}
                    </div>
                    <input type="hidden" name="base-price" value={{ $product_info->price }}>
                </div>

                {{-- saleprice --}}
                @if ($product_info->sale_off > 0)
                    <div class="flex justify-between items-center py-3 text-red-500 select-none">
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
                    <div class="flex justify-between items-center py-3 border-b border-gray-200 select-none">
                        <div class="font-semibold">Phí linh kiện nâng cấp</div>
                        <div class="font-semibold text-2xl price-accesories">0đ</div>
                        <input type="hidden" name="price-accesories" value="">
                    </div>
                @endif

                {{-- total-price --}}
                <div class="flex justify-between items-center py-3 select-none">
                    <div class="font-semibold">Tổng cộng</div>
                    <div class="font-semibold text-2xl total-price text-green-700">
                        @if ($product_info->sale_off > 0)
                            {{ num_format($product_info->price_sale_off) }}
                        @else
                            {{ num_format($product_info->price) }}
                        @endif
                    </div>
                    <input type="hidden" name="total-price"
                        value="{{ $product_info->sale_off > 0 ? $product_info->price_sale_off : $product_info->price }}">
                </div>

                <div class="flex justify-end gap-5 py-4">
                    <a href="{{ url()->previous() }}"
                        class="rounded-md text-gray hover:brightness-125 flex items-center gap-1 hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg>
                        <span class="select-none">Quay về</span>
                    </a>
                    <button
                        class="bg-gradient-to-r flex gap-2 items-center from-blue-600 to-blue-800 text-white px-5 py-2 rounded-lg hover:brightness-125 cursor-pointer">
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

    {{-- comment --}}
    <div
        class="box-btn flex items-center justify-between {{ $errors->any() ? '' : 'animate_reveal' }} py-5 px-6 md:px-0">
        <div class="space-y-2">
            <h1 class="text-3xl font-semibold text-gray-900">Đánh giá ({{ $product_info->name }})</h1>
            <div class="h-1 w-[100px] bg-blue-600 rounded-md"></div>
        </div>
    </div>

    <div class="flex flex-col md:items-start md:flex-row gap-5 px-5 md:px-0">
        <div class="bg-white p-5 rounded-xl border border-gray-200 w-full md:w-[50%] md:sticky top-10">
            <div class="flex items-center gap-2 py-1">
                @for ($i = 1; $i <= 5; $i++)
                    <div class="star-item" data-vote="{{ $i }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-8 text-amber-500 cursor-pointer ">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                        </svg>
                    </div>
                @endfor
                <div class="vote-text font-semibold ms-2 text-16px">(Chưa có bình chọn)</div>
            </div>
            @error('vote')
                <span class="vote_error text-red-500">{{ $message }}</span>
            @enderror


            <form action="{{ route('danh-gia-san-pham.store') }}" method="post">
                @csrf
                <div class="mt-2">
                    <x-input-field.field label="Họ và tên" type="text" name="name" id="name"
                        placeholder="Nguyễn Văn A" autocomplete="on" required="*" />
                </div>

                <div class="mt-2">
                    <x-input-field.field label="Bạn là (học sinh, sinh viên, người làm tự do....) ?" type="text"
                        name="job" id="job" placeholder="vd: Lập trình viên" required="*" />
                </div>

                <div class="mt-2">
                    <x-form-element.text-area label="Nội dung đánh giá" name="comment" id="comment" required="*"
                        class="h-[96px]" />
                </div>

                <input type="hidden" name="vote" value="{{ old('vote') }}">
                <input type="hidden" name="product_id" value="{{ $product_info->id }}">

                <div class="md:flex md:justify-end mt-2 gap-3 items-center">
                    <div class="text-green-700 mt-2 md:mt-0">{{ session('status') }}</div>
                    <x-button.primary-button class="mt-2 md:mt-0 py-[5px] w-full md:w-auto send-reviews">Gửi đánh
                        giá</x-button.primary-button>
                </div>

            </form>
        </div>
        <div class="bg-white p-5 rounded-xl border border-gray-200 flex-1">
            @if ($product_reviews->count() > 0)
                @foreach ($product_reviews as $item)
                    <div class="border-b border-gray-200 py-5">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 flex justify-center items-center text-white rounded-full bg-gradient-to-r from-blue-600 to-blue-800 font-semibold">
                                {{ Str::substr($item->name, 0, 1) }}
                            </div>
                            <div>
                                <div class="font-semibold">{{ $item->name }}</div>
                                <div class="text-sm text-gray-500 italic">{{ $item->job }}</div>
                            </div>
                        </div>

                        <div class="flex gap-1 mt-3">
                            @for ($i = 1; $i <= $item->vote; $i++)
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-7 text-amber-500">
                                        <path fill-rule="evenodd"
                                            d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            @endfor
                        </div>
                        <div class="mt-3">
                            {{ $item->comment }}
                        </div>
                    </div>
                @endforeach
            @else
                <div
                    class="text-gray-400 text-center md:text-left h-[354px] flex flex-col gap-1 justify-center items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                            stroke="currentColor" class="size-10">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                        </svg>
                    </div>
                    <div>Hiện chưa có đánh giá nào cho sản phẩm này !</div>
                </div>
            @endif
        </div>
    </div>

    {{-- product --}}
    <div class="mt-5 py-3">
        <x-slider-product.list :products="$more_products" target="more-product" title="Sản phẩm cùng loại" />
    </div>
</x-client-layout>
