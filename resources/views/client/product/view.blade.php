<x-client-layout>
    <div class="pt-3 pb-10">
        <div class="flex justify-between items-end">
           
                <a href="{{ url(request()->path()) }}"
                    class="animate_reveal text-6xl font-bold tracking-tight bg-gradient-to-r from-blue-600 to-blue-900 bg-clip-text text-transparent py-3">
                    {{ $title }}
                </a>
          

            @if ($top_sale)
                <div class="flex flex-col gap-2 items-end animate_reveal">
                    <h1 class="font-[500] client-total-products text-3xl flex gap-2 items-center tracking-tight">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-7 text-amber-500">
                            <path fill-rule="evenodd"
                                d="M12.963 2.286a.75.75 0 0 0-1.071-.136 9.742 9.742 0 0 0-3.539 6.176 7.547 7.547 0 0 1-1.705-1.715.75.75 0 0 0-1.152-.082A9 9 0 1 0 15.68 4.534a7.46 7.46 0 0 1-2.717-2.248ZM15.75 14.25a3.75 3.75 0 1 1-7.313-1.172c.628.465 1.35.81 2.133 1a5.99 5.99 0 0 1 1.925-3.546 3.75 3.75 0 0 1 3.255 3.718Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="bg-gradient-to-r from-amber-500 to-red-600 bg-clip-text text-transparent">Giảm sâu
                            nhất
                            - lên đến {{ $top_sale->sale_off }}%</span>
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

    <div class="py-5 flex justify-between">
        <div class="flex gap-3 items-center">
            <ul class="flex gap-2">
                <li class="product-category-item animate_reveal product-category-item px-5 bg-white py-1 rounded-2xl outline outline-1 outline-gray-200 hover:outline-blue-600 hover:outline-2 cursor-pointer {{ request()->input('category') ? '' : 'category-active' }}"
                    data-category-id="" data-url="{{ request()->path() }}">
                    Tất cả
                </li>
                @foreach ($types as $key => $value)
                    <li class="product-category-item animate_reveal product-category-item px-5 bg-white py-1 rounded-2xl outline outline-1 outline-gray-200 hover:outline-blue-600 hover:outline-2 cursor-pointer {{ request()->input('category') == $value ? 'category-active' : '' }}"
                        data-category-id="{{ $value }}" data-url="{{ request()->path() }}"
                        style="animation-delay: {{ $loop->index * 0.1 }}s">
                        {{ $key }}
                    </li>
                @endforeach
            </ul>
        </div>

        <div>

        </div>
        <div class="animate_reveal">
            <div class="flex gap-2 items-center">
                <ul class="flex gap-3 items-center">
                    <span class="font-semibold">Theo giá:</span>
                    <li class="product-order-item animate_reveal product-order-item px-5 bg-white py-1 rounded-2xl outline outline-1 outline-gray-200 hover:outline-blue-600 hover:outline-2 cursor-pointer {{ request()->input('order') ? '' : 'category-active' }}"
                        data-order="" data-url="{{ request()->path() }}"
                        style="animation-delay: {{ 0 * 0.1 }}s">
                        Mặc định
                    </li>
                    <li class="product-order-item animate_reveal product-order-item px-5 bg-white py-1 rounded-2xl outline outline-1 outline-gray-200 hover:outline-blue-600 hover:outline-2 cursor-pointer {{ request()->input('order') == 'asc' ? 'category-active' : '' }}"
                        data-order="asc" data-url="{{ request()->path() }}"
                        style="animation-delay: {{ 1 * 0.1 }}s">
                        Từ thấp đến cao
                    </li>
                    <li class="product-order-item animate_reveal product-order-item px-5 bg-white py-1 rounded-2xl outline outline-1 outline-gray-200 hover:outline-blue-600 hover:outline-2 cursor-pointer {{ request()->input('order') == 'desc' ? 'category-active' : '' }}"
                        data-order="desc" data-url="{{ request()->path() }}"
                        style="animation-delay: {{ 2 * 0.1 }}s">
                        Từ cao đến thấp
                    </li>
                </ul>
            </div>
        </div>

    </div>

    <div class="flex gap-4 mt-2">
        {{-- product --}}
        <div class="rounded-xl client-list-products">
            @include('client.product.partials.list')
        </div>
    </div>

    {{-- why us --}}
    <div class="mt-1 py-3">
        <x-why-us />
    </div>

    {{-- support --}}
    <div class="mt-1 py-3">
        <x-support />
    </div>

</x-client-layout>
