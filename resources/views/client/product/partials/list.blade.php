<ul class="grid grid-cols-5 gap-4 gap-y-4">
    @foreach ($products as $item)
        <li class="group animate_reveal" style="animation-delay:{{ $loop->index * 0.1 }}s">
            <div
                class=" shrink-0 relative inline-block bg-white rounded-2xl shadow-md pt-4 pb-2 transiton-all duration-200">
                @if ($item->sale_off != null || $item->sale_off > 0)
                    <div
                        class="absolute z-40 top-3 left-3 px-3 py-[1px] rounded-xl font-semibold bg-red-600/10 text-red-600">
                        Giảm giá {{ $item->sale_off }}%
                    </div>
                @endif
                <a href="{{ url($item->slug) }}">
                    <img src="{{ asset($item->medias[0]->url) }}"
                        alt=""
                        class="w-full object-cover overflow-hidden group-hover:scale-90 transition-all duration-200">
                </a>
                <div class="px-5">
                    <div class="truncate w-[180px] font-semibold text-[16px] py-1">
                        <a href="{{ url($item->slug) }}">{{ $item->name }}</a>

                    </div>
                    <div class="truncate w-[180px] text-sm text-gray-500">{{ $item->desc }}</div>
                    @if ($item->price_sale_off != null)
                        <div class="flex gap-2 my-3">
                            <div class="text-red-600/90 text-lg font-semibold">
                                {{ num_format($item->price_sale_off) }}</div>
                            <div class="text-gray-500 line-through">{{ num_format($item->price) }}
                            </div>
                        </div>
                    @else
                        <div class="text-lg font-semibold my-2">{{ num_format($item->price) }}</div>
                    @endif
                </div>
                <div class="my-3 flex justify-end gap-2 px-5">
                                <a href="{{url($item->slug)}}"
                                    class="text-blue-600 hover:underline flex items-center gap-1">
                                    <span>Xem chi tiết</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                    </svg>
                                </a>
                            </div>
            </div>
        </li>
    @endforeach
</ul>
<div class="mt-3 py-5 flex justify-center">
    {{ $products->links('pagination::tailwind', ['module' => 'client-list-products']) }}
</div>
