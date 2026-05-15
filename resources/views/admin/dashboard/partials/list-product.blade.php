@if ($products->count() > 0)
    <div class="">
        <div class="p-[14px] flex justify-between items-center">
            <div class="text-[18px] flex gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                </svg>

                <span class="font-semibold">Bán chạy nhất</span>
            </div>
        </div>

        <hr>

        <table class="w-full mt-3">
            @foreach ($products as $item)
            <tr class="border-b border-gray-100 animate_tl" style="animation-delay: {{ $loop->index * 0.1 }}s">
                <td class="pl-3 py-5"><img src="{{ asset($item->medias[0]->url) }}" alt="" class="w-14"></td>
                <td class="px-3">
                    <div class="text-wrap">
                        {{ $item->name }}
                    </div>
                </td>
            </tr>
            @endforeach
            
        </table>
    </div>

@else
    <x-list-not-found />
@endif
