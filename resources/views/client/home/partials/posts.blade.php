@if ($posts->count() > 0)
    <h1 class="text-2xl text-gray-800 flex items-end gap-3">
        <span class="font-semibold">Tin tức nổi bật.</span>
        <a href="" class="text-blue-600 hover:underline text-sm flex gap-2">
            <div>Xem tất cả</div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                </svg>
            </div>
        </a>
    </h1>
    <div class="mt-7">
        <ul class="grid grid-cols-4">
            @foreach ($posts as $item)
                <li class="pr-4 group">
                    <a href="{{ $item->slug }}"
                        class="inline-block bg-white p-4 rounded-3xl shadow-md transition-all duration-200">
                        <img src="{{ asset($item->media->url) }}" alt=""
                            class="w-full h-[150px] object-cover rounded-2xl">
                        <div class="font-semibold text-[16px] mt-3 line-clamp-2 group-hover:underline">{{ $item->title }}</div>
                        <div class="text-gray-500 line-clamp-2 mt-2">{{ $item->desc }}</div>
                        <div class="text-xs mt-4">Đăng ngày {{ $item->created_at->format('d/m/Y') }}</div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endif
