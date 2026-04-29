<x-client-layout>
    <div class="flex gap-2 items-center py-3">
        <x-client-breadcrum/>
    </div>
    <div class="flex items-center gap-5">
        <div class="flex-1">
            <h1
                class="text-5xl pb-2 font-bold bg-gradient-to-r from-blue-500 to-blue-800 bg-clip-text text-transparent tracking-tighter">
                Kiến thức công nghệ, giá trị thực cho bạn
            </h1>
            <h1 class="text-4xl py-5 font-bold bg-gradient-to-r from-gray-500 to-gray-800 bg-clip-text text-transparent tracking-tighter">
                Nơi chia sẻ những xu hướng mới và hướng dẫn tối ưu trải nghiệm thiết bị số của bạn.
            </h1>
        </div>
        <div class="w-[50%]">
            <img src="{{ asset('images/dot-map.png') }}" alt="" class="w-full h-full object-cover">
        </div>
    </div>

    <div class="flex gap-3 items-center mt-5">
        <div class="font-semibold text-xl">Danh mục :</div>
        <ul class="flex gap-2 flex-wrap">
            <li class="post-category-item px-3 py-2 rounded-full bg-blue-600/10 text-blue-600 cursor-pointer hover:outline-blue-600 hover:outline outline-1 post-category-active" data-category-id="all">Tất cả
            </li>
            @foreach ($categories as $item)
                <li class="px-4 py-2 rounded-full bg-blue-600/10 text-blue-600 cursor-pointer hover:outline-blue-600 hover:outline outline-1 post-category-item" data-category-id="{{ $item->id }}">{{ $item->name }}
                </li>
            @endforeach
        </ul>
    </div>

    <div class="mt-5 client-list-posts">
        @include('client.post.partials.list')
    </div>

</x-client-layout>
