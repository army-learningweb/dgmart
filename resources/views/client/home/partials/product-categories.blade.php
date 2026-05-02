<ul class="flex gap-10">
            @foreach ($products_categories as $item)
                <li class="animate_reveal group" style="animation-delay: {{ $loop->index * 0.1 }}s">
                    <a href="{{ url($item->slug) }}" class="flex flex-col gap-3 items-center justify-center">
                        <img src="{{ asset($item->media->url) }}" alt="{{ $item->media->name }}"
                            class="w-full h-[65px] object-contain">
                        <div class="group-hover:text-blue-600">{{ $item->name }}</div>
                    </a>
                </li>
            @endforeach
        </ul>