@if ($products->count() > 0)
    <div
        class="bg-white shadow-md mt-2 py-3 px-5 rounded-xl text-sm overflow-x-auto md:overflow-visible scrollbar-thin scrollbar-thumb-rounded-full scrollbar-thumb-gray-400 scrollbar-track-transparent">
        <table class="min-w-[1200px] md:w-full">
            <tr class="font-semibold">
                <td class="px-2 py-2">
                    <input type="checkbox" name="" id="check_all" class="check_all rounded-[3px] mb-[2px]">
                    <label for="check_all" class="ms-[2px] text-sm"></label>
                </td>
                <td class="text-center">Ảnh</td>
                <td class="px-1">Sản phẩm</td>
                <td class="">Giá & Ưu đãi</td>
                <td class="px-4">Hàng kho</td>
                <td class="px-5">Trạng thái</td>
                <td class="">Cập nhật trạng thái</td>
                <td class="px-2">Ngày tạo</td>
                <td class="px-2">Người tạo</td>
                <td class="px-1 text-center">Thao tác</td>
            </tr>
            @foreach ($products as $product)
                <tr class="border-b border-gray-500/10 hover:bg-[#f5f5f5] animate_tl"
                    style="animation-delay: {{ $loop->index * 0.1 }}s">
                    <td class="px-2">
                        <input type="checkbox" name="products_id[]" value="{{ $product->id }}"
                            form="form-product-action"
                            {{ in_array($product->id, (array) old('products_id')) ? 'checked' : '' }}
                            class="check_single rounded-[3px] mb-[2px]">
                    </td>
                    <td class="py-2">
                        @if (
                            !empty(
                                $product->medias
                            ))
                            <div class="flex justify-center items-center">
                                <a href="{{ asset($product->medias[0]->url) }}" target="blank">
                                    <img src="{{ asset($product->medias[0]->url) }}"
                                    alt="{{ $product->medias[0]->name }}" class="w-[100px] h-[65px] object-contain">
                                </a>
                                
                            </div>
                        @else
                            <x-table.unknow />
                        @endif

                    </td>
                    <td class="px-1">
                        <div class="w-[200px] truncate">
                            {{ $product->name }}
                        </div>
                        <div class="text-gray-500 italic w-[200px] truncate">
                            @if ($product->category)
                                {{ $product->category->name }}
                            @else
                                <x-table.unknow/>
                            @endif   
                        </div>
                    </td>
                    <td class="">
                        <div class="w-[90px] truncate">
                            {{ num_format($product->price) }}
                        </div>
                        <div class="flex gap-2 items-center text-gray-500 italic">
                            Giảm giá {{ $product->sale_off > 0 ? $product->sale_off : 0 }}%
                        </div>
                    </td>
                    <td class="px-2">
                        <div class="ms-6">
                            {{ $product->quantity }}
                        </div>
                        
                    </td>
                    <td class="px-1 status-products-{{ $product->id }}">
                            <div class="w-[110px]">
                                {!! user_status($product->status) !!}
                            </div>
                    </td>
                    <td class="">
                        <x-table.select name="select-status" module="products" class="select-status"
                            data-id="{{ $product->id }}">
                            <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Hoạt động
                            </option>
                            <option value="unactive" {{ $product->status == 'unactive' ? 'selected' : '' }}>Vô hiệu hóa
                            </option>
                        </x-table.select>
                    </td>
                    <td class="px-2">
                        {{ $product->created_at->format('d/m/Y') }}
                    </td>
                    <td class="px-2">
                        <div class="w-[50px] truncate">
                            @if ($product->user)
                                {{ $product->user->name }}
                            @else
                                <x-table.unknow/>
                            @endif
                            
                        </div>
                    </td>
                    <td class="px-1">
                        <div class="flex justify-center items-center gap-2 h-full">
                            <x-table.button-edit button="edit-product" module="products" id="{{ $product->id }}" />
                            <x-table.button-delete route="{{ route('admin.products.destroy', $product->id) }}"
                                confirm="Bạn có chắc muốn xóa sản phẩm ({{ $product->name }}) ra khỏi hệ thống ?" />
                        </div>
                    </td>

                </tr>
            @endforeach
        </table>
    </div>
    <div class="mt-2">
        {{ $products->links('pagination::tailwind', ['module' => 'products']) }}
    </div>
@else
    <x-list-not-found />
@endif
