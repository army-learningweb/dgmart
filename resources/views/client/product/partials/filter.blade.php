@if (count($filters) > 0)
    <h1 class="font-semibold text-[16px]">Bộ lọc</h1>
    <div class="mt-3">
        <ul class="flex gap-1">
            @foreach ($filters as $item)
                <li class="py-2 px-5 rounded-full bg-gray-100 flex gap-2 items-center">
                    <div>{{ $item }}</div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4 cursor-pointer hover:text-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </li>
            @endforeach
        </ul>
    </div>
    <hr class="my-3">
@endif
