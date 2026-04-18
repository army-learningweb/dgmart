<form action="" method="post">

    <div class="py-3 flex items-center gap-3">
        @include('client.product.partials.breadcrum')
    </div>

    <div class="flex justify-between items-center py-3">

        <h1 class="font-semibold text-xl w-[25%]"> {{ $title }} ({{ $total }})</h1>

        <div class="flex-1">
            <x-form-element.search placeholder="Tìm kiếm theo tên..." name="search-product" module="products" class="search py-2" />
        </div>

        <div class="flex gap-1 items-center justify-end w-[25%]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6 text-gray-700/90">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
            </svg>
            <x-form-element.select name="client-order-price" form="form-product-action">
                <option value="">Sắp xếp theo giá</option>
                <option value="to-low">Thấp đến cao</option>
                <option value="to-hight">Cao đến thấp</option>
            </x-form-element.select>
        </div>

    </div>
</form>

<div class="mt-3">
    <ul class="grid grid-cols-4 gap-3 gap-y-3">
        @foreach ($products as $item)
            <li class="group">
                <a href="{{ $item->slug }}"
                    class="shrink-0 relative inline-block bg-white rounded-2xl shadow-md pt-4 pb-2 transiton-all duration-200">
                    @if ($item->sale_off != null || $item->sale_off > 0)
                        <div
                            class="absolute z-40 top-3 left-3 px-3 py-[1px] rounded-xl font-semibold bg-red-600/10 text-red-600">
                            Giảm giá {{ $item->sale_off }}%
                        </div>
                    @endif
                    <img src="{{ asset($item->medias->where('is_main', 0)->where('object_id', $item->id)->where('type', 'product')->value('url')) }}"
                        alt=""
                        class="w-full object-cover overflow-hidden group-hover:scale-90 transition-all duration-200">
                    <div class="px-5">
                        <div
                            class="truncate w-[180px] font-semibold text-[16px] py-1 group-hover:underline underline-offset-1">
                            {{ $item->name }}
                        </div>
                        <div class="truncate w-[180px] text-sm text-gray-500">{{ $item->desc }}</div>
                        @if ($item->price_sale_off != null)
                            <div class="flex gap-2 my-2">
                                <div class="text-red-600/90 text-lg font-semibold">
                                    {{ num_format($item->price_sale_off) }}</div>
                                <div class="text-gray-500 line-through">{{ num_format($item->price) }}
                                </div>
                            </div>
                        @else
                            <div class="text-lg font-semibold my-2">{{ num_format($item->price) }}</div>
                        @endif
                        <div class="flex justify-between my-3">
                            <div class="flex gap-1 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6 text-amber-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd" />
                                </svg>
                                (5)
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 hover:text-pink-600">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
    <div class="mt-5">
        {{ $products->links('pagination::tailwind', ['module' => 'products']) }}
    </div>
</div>
