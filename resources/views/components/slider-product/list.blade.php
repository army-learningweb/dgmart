@props([
    'products' => '',
    'title' => '',
    'tag' => '',
    'tag_variant' => '',
    'target' => '',
])

@if ($products->count() > 0)
    <div class="box-btn flex items-center justify-between">
        <div class="space-y-2">
            <h1 class="text-3xl font-semibold text-gray-900">{{ $title }}</h1>
            <div class="h-1 w-[100px] bg-blue-600 rounded-md"></div>
        </div>
        
        <x-button.button-slider target="{{ $target }}" />
    </div>

    <div class="slider-product overflow-hidden rounded-3xl mt-5 py-2">
        <div class="{{ $target }} transition-all duration-300" data-index="0">
            <ul class="flex">
                @foreach ($products as $item)
                    <li class="shrink-0 w-[20%] px-2 rounded-2xl relative group animate_reveal" style="animation-delay: {{$loop->index * 0.1}}s">
                        <div
                            class="relative inline-block bg-white rounded-2xl shadow-md pt-4 pb-2 transiton-all duration-200">
                            @if ($item->sale_off != null || $item->sale_off > 0)
                                <div
                                    class="absolute z-50 top-3 left-3 px-3 py-[1px] rounded-xl font-semibold bg-red-600/10 text-red-600">
                                    Giảm giá {{ $item->sale_off }}%
                                </div>
                            @else
                                <div
                                    class="absolute z-50 top-3 left-3 px-3 py-[1px] rounded-xl font-semibold {{ $tag_variant }}">
                                    {{ $tag }}
                                </div>
                            @endif
                            <a href="{{url($item->slug)}}">
                                <img src="{{ asset($item->medias->where('is_main', 0)->where('object_id', $item->id)->where('type', 'product')->value('url')) }}"
                                    alt=""
                                    class="w-full object-cover overflow-hidden group-hover:scale-90 transition-all duration-150">
                            </a>

                            <div class="px-5">
                                <div class="truncate w-[180px] font-semibold text-[16px] py-1">
                                    {{ $item->name }}</div>
                                <div class="truncate w-[180px] text-sm text-gray-500">{{ $item->desc }}</div>
                                @if ($item->price_sale_off != null)
                                    <div class="flex gap-2 my-2">
                                        <div class="text-red-600/90 text-lg font-semibold">
                                            {{ num_format($item->price_sale_off) }}</div>
                                        <div class="text-gray-500 line-through">{{ num_format($item->price) }}</div>
                                    </div>
                                @else
                                    <div class="text-lg font-semibold my-2">{{ num_format($item->price) }}</div>
                                @endif
                            </div>
                            <div class="my-3 flex justify-between gap-2 px-5">
                                <a href=""
                                    class="w-[40%] py-[6px] rounded-2xl bg-gray-200 text-center hover:underline underline-offset-1">Chi
                                    tiết...</a>
                                <a href=""
                                    class="flex-1 bg-gradient-to-r from-blue-600 to-blue-900 py-[6px] text-center rounded-2xl text-white hover:brightness-125">
                                    Thêm vào giỏ
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
