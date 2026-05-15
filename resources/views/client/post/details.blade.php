<x-client-layout>
    
    <div class="flex bg-white rounded-3xl shadow-md p-5">
        <div class="flex-1 border-r border-gray-500/20 p-5 pt-0 pl-0">
            <h1 class="font-semibold text-2xl">
                <div>{{ $post_info->title }}</div>
                <div class="bg-blue-600 w-[100px] h-[2px] my-3 inline-block rounded-lg"></div>
            </h1>
            <h2 class="text-gray-700 text-md">{{ $post_info->desc }}</h2>
            @if ($post_info->media)
                <img src="{{ asset($post_info->media->url) }}" alt="{{ $post_info->media->slug }}"
                    class="w-full rounded-3xl my-5">
            @endif
            <div class="client-post-content mt-5">
                {!! $post_info->content !!}
            </div>
            <div class="flex flex-col gap-1">
                <div> Tác giả: <span class="italic text-blue-600">{{ $post_info->user->name }}</span></div>
                <div>Đăng ngày: <span class="italic text-blue-600">{{ $post_info->created_at->format('d/m/Y') }}</span></div>

            </div>
        </div>
        <div class="w-[35%] p-5 pt-0">
            <div class="sticky top-3">
                <div class="flex justify-between">
                    <div>
                        <h1 class="font-semibold text-xl">
                            <div>Các bài viết khác</div>
                            <div class="bg-blue-600 w-[100px] h-[2px] my-3 inline-block rounded-lg"></div>
                        </h1>
                    </div>
                    <a href="{{ url('bai-viet') }}"
                        class="text-blue-600 hover:underline text-sm flex gap-1 justify-between group">
                        <div>Xem tất cả</div>
                        <div class="group-hover:translate-x-1 transition-all duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>
                        </div>
                    </a>
                </div>
                <ul>
                    @foreach ($posts as $item)
                        <li class="mb-3 group animate_reveal" style="animation-delay: {{ $loop->index * 0.1 }}s">
                            <a href="{{ url($item->slug) }}" class="flex gap-5 items-center">
                                <img src="{{ asset($item->media->url) }}" alt=""
                                    class="rounded-xl object-cover h-[100px] w-[160px]">
                                <div class="flex-1">
                                    <h2 class="text-sm line-clamp-2 group-hover:underline underline-offset-1">
                                        {{ $item->title }}</h2>
                                    <p class="text-sm font-normal text-gray-500/80 line-clamp-2">{{ $item->desc }}
                                    </p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</x-client-layout>
