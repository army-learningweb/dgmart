<x-app-layout>

    {{-- flash session --}}
    <x-flash-session.success-flash-session />
    <x-flash-session.failed-flash-session />

    <div class="py-4 h-[500px] border-t border-gray-500/50 border-dashed">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-between gap-2 w-full md:w-auto">
                {{-- title --}}
                <div class="text-lg"> Danh sách đơn hàng</div>
            </div>

            {{-- statis module --}}
            <div class="hidden md:block">
                <x-statis.statis-module module="orders"
                total="{{ $total }}"
                pending="{{ $pending }}" 
                processing="{{ $processing }}"
                shipped="{{ $shipped }}"
                delivered="{{ $delivered }}"
                refund="{{ $refund }}"
                canceled="{{ $canceled }}"/>
            </div>
        </div>

        <div class="mt-3">
            <div class="flex flex-col md:flex-row justify-between gap-2">

                <div class="order-2 md:order-2 flex gap-1 items-center">
                    <div class="text-blue-600 tracking-tight font-semibold">TỔNG DOANH THU: <span class="text-black font-semibold text-lg revenue">{{ num_format($revenue) }}</span></div>
                </div>

                {{-- filter --}}
                <div class="flex flex-col md:flex-row md:items-center gap-2 md:mt-0 order-3 md:order-3">

                    {{-- search --}}
                    <div>
                        <x-form-element.search placeholder="Tìm kiếm theo (tên, sđt)" name="search-order" module="orders"
                            class="search" />
                    </div>

                    {{-- status --}}
                    <div>
                        <x-form-element.select name="order-filter" module="orders" class="select-filter py-1">
                            <option value="">Lọc theo trạng thái</option>
                            <option value="pending" {{ request()->input('filter') == 'pending' ? 'selected' : '' }} >Chờ xử lý</option>
                            <option value="processing" {{ request()->input('filter') == 'processing' ? 'selected' : '' }} >Đang xử lý</option>
                            <option value="shipped" {{ request()->input('filter') == 'shipped' ? 'selected' : '' }} >Đang giao</option>
                            <option value="delivered" {{ request()->input('filter') == 'delivered' ? 'selected' : '' }} >Đã nhận</option>
                            <option value="refund" {{ request()->input('filter') == 'refund' ? 'selected' : '' }} >Hoàn trả</option>
                            <option value="canceled" {{ request()->input('filter') == 'canceled' ? 'selected' : '' }}>Hủy đơn</option>
                        </x-form-element.select>
                    </div>

                    {{-- reset --}}
                    <div class="hidden md:block">
                        <x-button.button-reset link="{{ route('admin.orders') }}"/>
                    </div>

                </div>
            </div>

            {{-- list --}}
            <div class="list-orders pb-5">
                @include('admin.order.partials.list')
            </div>

        </div>

    </div>
</x-app-layout>
