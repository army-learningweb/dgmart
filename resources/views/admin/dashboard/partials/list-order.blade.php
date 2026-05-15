@if ($orders->count() > 0)

    <div class="p-[16px] flex justify-between items-center">
        <div class="text-[18px] font-semibold">Đơn hàng mới nhất</div>
        <div>
            <a href="{{ route('admin.orders') }}" class="text-blue-600 flex items-center gap-1 hover:underline">
                <span>Xem tất cả</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </a>
        </div>
    </div>

    <hr>
    <div
        class="overflow-x-auto md:overflow-visible scrollbar-thin scrollbar-thumb-rounded-full scrollbar-thumb-gray-400 scrollbar-track-transparent">
        <table class="md:w-full min-w-[900px] mt-3">
            <tr class="font-semibold">
                <td class="pl-3 py-2">Mã đơn</td>
                <td class="px-5">Tổng tiền</td>
                <td class="px-5">Tên khách</td>
                <td class="px-5">Điện thoại</td>
                <td class="px-5">Trạng thái</td>
                <td class="">Thời gian cụ thể</td>
            </tr>
            @foreach ($orders as $order)
                <tr class="border-b border-gray-500/10 hover:bg-[#f5f5f5] animate_tl"
                    style="animation-delay: {{ $loop->index * 0.1 }}s">
                    <td class="pl-3 py-5">
                        {{ $order->code }}
                    </td>
                    <td class="px-5 font-semibold">
                        {{ num_format($order->price) }}
                    </td>
                    <td class="px-5">
                        <div class="w-[80px] truncate">
                            {{ $order->name }}
                        </div>

                    </td>
                    <td class="px-5">{{ $order->tel }}</td>
                    <td class="px-5">
                        <div class="status-orders-{{ $order->id }}">
                            {!! order_status($order->status) !!}
                        </div>
                    </td>
                    <td class="">
                        {{ $order->created_at->format('d/m/Y') }} - ({{ $order->created_at->diffForHumans() }})
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@else
    <x-list-not-found />
@endif
