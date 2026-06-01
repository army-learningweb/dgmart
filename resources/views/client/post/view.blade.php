<x-client-layout>

    <div class="flex flex-col md:flex-row items-center gap-5 animate_reveal px-4 md:px-0">
        <div class="flex-1">
            <h1 class="text-6xl font-bold tracking-tight bg-gradient-to-r from-blue-600 to-blue-900 bg-clip-text text-transparent py-3">Bài viết</h1>
            <h1 class="text-4xl py-5 font-bold bg-gradient-to-r from-gray-500 to-gray-800 bg-clip-text text-transparent tracking-tighter">
                Chia sẻ những xu hướng, cập nhật tin tức mới về công nghệ.
            </h1>
        </div>
        <div class="w-[50%] hidden md:block">
            <img src="{{ asset('images/dot-map.png') }}" alt="" class="w-full h-full object-cover">
        </div>
    </div>

    <div class="flex gap-3 items-center mt-5 animate_reveal px-4">
        <ul class="flex gap-2 flex-wrap">
            <li class="post-category-item px-3 py-[5px] rounded-full bg-white border border-gray-200 cursor-pointer hover:outline-blue-600 hover:outline outline-1 {{ request()->input('category') ? '' : 'category-active' }}" data-category-id="">Tất cả
            </li>
            @foreach ($categories as $item)
                <li class="px-4 py-[5px] rounded-full bg-white border border-gray-200 cursor-pointer hover:outline-blue-600 
                hover:outline outline-2 post-category-item {{ request()->input('category') == $item->id ? 'category-active' : '' }}" data-category-id="{{ $item->id }}">{{ $item->name }}
                </li>
            @endforeach
        </ul>
    </div>

    <div class="mt-5 client-list-posts">
        @include('client.post.partials.list')
    </div>

</x-client-layout>
