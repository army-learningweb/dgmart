@if ($trashs->count() > 0)
    <div
        class="bg-white shadow-md mt-3 px-5 pb-3 rounded-2xl text-sm overflow-auto scrollbar-thin scrollbar-thumb-rounded-full scrollbar-thumb-gray-400 scrollbar-track-transparent md:max-h-[490px]">
        <table class="min-w-[1000px] md:w-full">
            <tr class="sticky top-0 z-50 bg-white font-semibold">
                <td class="pl-7 py-3">#</td>
                <td class="px-5 text-center">Ảnh</td>
                <td class="px-10">Loại ảnh</td>
                <td class="px-7">Tên File</td>
                <td class="px-10">Kích cỡ</td>
                <td class="">Tình trạng lỗi File</td>
                <td class="px-5">Ngày tạo</td>
                <td class="px-5">Người tạo</td>
            </tr>

            @foreach ($trashs as $item)
                <tr class="border-b border-gray-500/20 hover:bg-gray-100 animate_tl" style="animation-delay: {{ $loop->index * 0.1 }}s">
                    <td class="pl-7 py-2">{{ $loop->iteration }}</td>
                    <td class="px-5 py-2">
                        <div class="flex justify-center">
                            <img src="{{ asset($item->url) }}" alt="" class="rounded-md w-[100px] h-[60px] object-cover">
                        </div>
                    </td>
                    <td class="px-10">{{ $item->type }}</td>
                    <td class="px-7">
                        <div class="w-[120px] truncate">
                            {{ $item->name. "." .$item->extension }}
                        </div>
                    </td>
                    <td class="px-10">
                        {{ $item->size }} KB
                    </td>
                    <td class="">
                        <div class="bg-red-500/10 text-red-500 rounded-md w-auto inline px-3 py-[4px] text-xs">File không có đối tượng !</div>
                    </td>
                    <td class="px-5">{{ $item->created_at->format('d/m/Y') }}</td>
                    <td class="">
                        @if ($item->user)
                            <div class="w-[100px] truncate text-center">
                                {{ $item->user->name }}
                            </div>
                        @else
                            <x-table.unknow/>
                        @endif
                       
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@else
    <x-list-not-found />
@endif
