<x-app-layout>

    {{-- flash session --}}
    <x-flash-session.success-flash-session />
    <x-flash-session.failed-flash-session />

    <div class="py-4 h-[500px] border-t border-gray-500/50 border-dashed">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-between gap-2 w-full md:w-auto">
                {{-- title --}}
                <a href="{{ route('admin.orders') }}" class="flex gap-5 items-center">
                    <div class="flex gap-1 items-center text-gray-500 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                        <span>Danh sách đơn hàng</span>
                    </div>
                    <span class="text-sm md:text-lg">Đơn hàng ({{ $order->code }})</span>
                </a>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-3 mt-5 items-start {{ $errors->any() || session('status') ? '' : 'animate_reveal' }} pb-5">
            <div class="w-full md:w-[40%] bg-white shadow-md pt-4 pb-3 px-5 rounded-xl">
                <form action="{{ route('admin.orders.update',$order->id) }}" method="post">
                    @csrf
                    <div class="mt-2">
                        <x-input-field.field label="Tên khách hàng" type="text" name="name" id="name"
                            required="*" value="{{ $order->name }}" />
                    </div>

                    <div class="mt-2">
                        <x-input-field.field label="Số điện thoại" type="text" name="tel" id="tel"
                            required="*" value="{{ $order->tel }}" />
                    </div>

                    <div class="mt-2">
                        <x-input-field.field label="Email" type="text" name="email" id="email" required="*"
                            value="{{ $order->email }}" />
                    </div>

                    <div class="mt-2">
                        <x-form-element.text-area label="Địa chỉ giao hàng" name="address" id="address" required="*"
                            class="h-[80px]" value="{{ $order->address }}" />
                    </div>

                    <div class="mt-2">
                        <x-form-element.text-area label="Ghi chú" name="note" id="note" class="h-[80px]"
                            value="{{ $order->note }}" />
                    </div>

                    <div class="mt-2">
                        <label for="status">Trạng thái <span class="text-red-600">*</span></label>
                        <select name="status" id="status" class="mt-1 rounded-md py-[7px] md:py-[5px] text-sm border-gray-200 w-full">
                            <option value="">Trạng thái</option>
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Đang giao</option>
                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Đã nhận</option>
                            <option value="refund" {{ $order->status == 'refund' ? 'selected' : '' }}>Hoàn trả</option>
                            <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Hủy đơn</option>
                        </select>
                    </div>

                    <div class="mt-2 flex justify-end">
                        <x-button.primary-button class="py-[5px] md:w-auto">Cập nhật</x-button.primary-button>
                    </div>
                </form>
            </div>
            <div class="flex-1 bg-white shadow-md rounded-xl p-5">
                <div class="max-h-[480px] overflow-y-auto scrollbar-thin scrollbar-thumb-rounded-full scrollbar-thumb-gray-400 scrollbar-track-transparent">
                    <table class="w-full">
                    @foreach ($order_items as $item)
                        <tr class="border-b border-gray-200">
                            <td class="px-2">
                                <div class="flex gap-2 items-center">
                                    <img src="{{ asset($item->products->medias[0]->url) }}" alt=""
                                        class="hidden md:block w-[100px] object-contain">
                                    <div class="w-[120px] text-wrap">{{ $item->products->name }}</div>
                                </div>
                            </td>
                            <td class="px-3 py-3">
                                @if ($item->options)
                                    @foreach (json_decode($item->options) as $ops)
                                        <div class="my-1">
                                            <span class="font-semibold">{{ $ops->slug }}: </span>
                                            <span>{{ $ops->name }}</span>
                                        </div>
                                    @endforeach
                                @endif
                            </td>
                            <td class="px-5">
                                <div>
                                    x{{ $item->quantity }}
                                </div>
                            </td>
                            <td class="font-semibold">{{ num_format($item->price) }}</td>
                        </tr>
                    @endforeach
                </table>
                </div>
                

                <div class="mt-5 flex justify-between items-center">
                    <div>Tổng số lượng: <span class="font-semibold">{{ $order->quantity }}</span></div>
                    <div>Tổng đơn hàng: <span class="font-semibold text-lg">{{ num_format($order->price) }}</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
