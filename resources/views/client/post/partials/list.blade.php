@if ($posts->count() > 0)

<ul class="grid md:grid-cols-4 gap-y-3 px-4">
    @foreach ($posts as $item)
        <li class="md:pr-4 group post-item animate_reveal" style="animation-delay: {{ $loop->index * 0.1 }}s">
            <a href="{{ url($item->slug) }}"
                class="inline-block bg-white p-4 rounded-3xl shadow-md transition-all duration-200">
                <img src="{{ asset($item->media->url) }}" alt="" class="w-full h-[220px] md:h-[150px] object-cover rounded-2xl">
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
@else
<div class="flex flex-col items-center justify-center gap-10 mt-10">
    <img src="{{ asset('images/no-post.svg') }}" alt="" class="w-full h-[200px] md:h-[300px]">
    <div class="text-gray-500">Không tìm thấy nội dung bài viết nào với mục này!</div>
</div>
    
@endif

