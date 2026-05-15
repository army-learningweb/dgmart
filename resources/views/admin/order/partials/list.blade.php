@if ($orders->count() > 0)
    <div
        class="bg-white shadow-md mt-2 py-3 px-5 rounded-2xl text-sm overflow-x-auto md:overflow-visible scrollbar-thin scrollbar-thumb-rounded-full scrollbar-thumb-gray-400 scrollbar-track-transparent">
        <table class="min-w-[1100px] md:w-full">
            <tr class="font-semibold">
                <td class="px-5 py-2">Mã đơn</td>
                <td class="px-5">Tổng tiền</td>
                <td class="">Tên khách</td>
                <td class="px-5">Điện thoại</td>
                <td class="px-5">Trạng thái</td>
                <td class="">Cập nhật trạng thái</td>
                <td class="px-5">Thời gian</td>
                <td class="pl-5">Thao tác</td>
            </tr>
            @foreach ($orders as $order)
                <tr class="border-b border-gray-500/10 hover:bg-[#f5f5f5] animate_tl" style="animation-delay: {{ $loop->index * 0.1 }}s">
                    <td class="px-5 py-5">{{ $order->code }}</td>
                    <td class="px-5 font-semibold">
                        {{ num_format($order->price) }}
                    </td>
                    <td class="">
                        <div class="w-[100px] truncate">
                            {{ $order->name }}
                        </div>
                        
                    </td>
                    <td class="px-5">{{ $order->tel }}</td>
                    <td class="px-5">
                        <div class="status-orders-{{ $order->id }} w-[95px]">
                            {!! order_status($order->status) !!}
                        </div>
                    </td>
                    <td class="">
                        <x-table.select name="select-status" module="orders" class="select-status" type="order" data-id="{{ $order->id }}">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xử lí
                                </option>
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Đang xử lí
                                </option>
                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Đang giao
                                </option>
                                <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Hủy đơn
                                </option>
                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Đã nhận
                                </option>
                                <option value="refund" {{ $order->status == 'refund' ? 'selected' : '' }}>Hoàn trả
                                </option>
                        </x-table.select>
                    </td>
                    <td class="px-5">{{ $order->created_at->format('d/m/Y') }}</td>
                    <td class="pl-5 py-[10px]">
                        <a href="{{ route('admin.orders.details',$order->id) }}" class="flex gap-1 items-center text-blue-600 hover:underline underline-offset-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                            <span>Chi tiết</span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="mt-2">
        {{ $orders->links('pagination::tailwind', ['module' => 'orders']) }}
    </div>
@else
    <x-list-not-found />
@endif
