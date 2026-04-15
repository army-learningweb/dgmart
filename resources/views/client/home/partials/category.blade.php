@if ($categories_product->count() > 0)
    <div class="py-5">
        <ul class="flex gap-4">
            @foreach ($categories_product as $item)
                <li class="group">
                    <a href="{{ $item->slug }}" class="flex flex-col justify-center items-center gap-2">
                        @if (!empty($item->media->where('type', 'category')->where('object_id', $item->id)->value('url')))
                            <img src="{{ $item->media->where('type', 'category')->where('object_id', $item->id)->value('url') }}"
                                alt="" class="w-[120px] h-[120px] object-contain">
                        @else
                            <div
                                class="rounded-full w-[100px] h-[100px] bg-gradient-to-r from-gray-500 to-gray-700 flex justify-center items-center text-xl font-semibold text-white">
                                DG</div>
                        @endif

                        <span class="group-hover:text-blue-600">{{ $item->name }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endif
