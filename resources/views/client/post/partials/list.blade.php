<ul class="grid grid-cols-4 gap-y-3">
    @foreach ($posts as $item)
        <li class="pr-4 group post-item animate_reveal" style="animation-delay: {{ $loop->index * 0.1 }}s">
            <a href="{{ url($item->slug) }}"
                class="inline-block bg-white p-4 rounded-3xl shadow-md transition-all duration-200">
                <img src="{{ asset($item->media->url) }}" alt="" class="w-full h-[150px] object-cover rounded-2xl">
                <div class="font-semibold text-[16px] mt-3 line-clamp-2 group-hover:underline">
                    {{ $item->title }}</div>
                <div class="text-gray-500 line-clamp-1 mt-2">{{ $item->desc }}</div>
                <div class="text-xs mt-4 italic space-y-1">
                    <div>Ngày đăng: {{ $item->created_at->format('d/m/Y') }}</div>
                    <div>Tác giả: {{ $item->user->name }}</div>
                </div>
            </a>
        </li>
    @endforeach
</ul>

<div class="p-5 flex justify-center">
    {{ $posts->links('pagination::tailwind',['module'=>'client-list-posts']) }}
</div>
