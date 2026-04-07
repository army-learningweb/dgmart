@if ($products->count() > 0)
    <div
        class="bg-white shadow-md mt-3 py-3 px-5 rounded-md text-sm overflow-x-auto md:overflow-visible md:min-h-[450px] scrollbar-thin scrollbar-thumb-rounded-full scrollbar-thumb-gray-400 scrollbar-track-transparent">
        <table class="min-w-[1200px] md:w-full">

            <tr>
                <td class="px-3 py-2">
                    <input type="checkbox" name="" id="check_all" class="check_all rounded-[3px] mb-[2px]">
                    <label for="check_all" class="ms-[2px] text-sm"></label>
                </td>
                <td class="px-2">#</td>
                <td class="px-2 text-center">Ảnh</td>
                <td class="px-2">Tên</td>
                <td class="px-2">Giá</td>
                <td class="px-2">Danh mục</td>
                <td class="px-2 text-center">Giảm giá</td>
                <td class="px-2 text-center">Đã bán</td>
                <td class="px-2">Trạng thái</td>
                <td class="px-2">Cập nhật trạng thái</td>
                <td class="px-2 text-center">Thao tác</td>
            </tr>
            @foreach ($products as $product)
                <tr class="border-b border-gray-500/20 hover:bg-[#f5f5f5]">
                    <td class="px-3 py-4">
                        <input type="checkbox" name="products_id[]" value="{{ $product->id }}" form="form-product-action"
                            {{ in_array($product->id, (array) old('products_id')) ? 'checked' : '' }}
                            class="check_single rounded-[3px] mb-[2px]">
                    </td>
                    <td class="px-2">{{ $products->firstItem() + $loop->index }}</td>
                    <td class="px-5 py-2 text-center">
                        @php
                            $img = $product->medias->where('type','product')->where('is_main',0)->first();
                        @endphp
                        @if ($img)
                            <div class="flex justify-center items-center">
                                <img src="{{ asset($img->url) }}" alt=""
                                    class="w-[100px] h-[60px] object-cover rounded-md shadow-sm">
                            </div>
                        @else
                            <x-table.unknow />
                        @endif

                    </td>
                    <td class="px-2">
                        <div class="w-[100px] line-clamp-2">
                            {{ $product->name }}
                        </div>
                    </td>
                    <td class="px-2">
                        <div class="w-[80px] line-clamp-2">
                            {{ $product->price }}
                        </div>
                    </td>
                    <td class="px-2">
                        @if ($product->category)
                            <div class="w-[50px] line-clamp-1">
                                {{ $product->category->name }}
                            </div>
                        @else
                            <x-table.unknow />
                        @endif
                    </td>
                    <td class="px-2 text-center">
                        {{ $product->sale_off }}%
                    </td>
                    <td class="px-2 text-center">
                        {{ $product->sold ? $product->sold : 0}}
                    </td>
                    <td class="px-2 status-products-{{ $product->id }}">
                        <div class="w-[100px]">
                            {!! user_status($product->status) !!}
                        </div>
                    </td>
                    <td class="px-2">
                        <x-table.select module="products" class="select-status" data-id="{{ $product->id }}">
                            <option value="publish" {{ $product->status == 'publish' ? 'selected' : '' }}>Công khai
                            </option>
                            <option value="unpublish" {{ $product->status == 'unpublish' ? 'selected' : '' }}>Tạm ngưng
                            </option>
                            <option value="draft" {{ $product->status == 'draft' ? 'selected' : '' }}>Nháp
                            </option>
                        </x-table.select>
                    </td>

                    <td class="px-2">
                        <div class="flex justify-center items-center gap-2 h-full">
                            <x-table.button-edit button="edit-product" module="products" id="{{ $product->id }}" />
                            <x-table.button-delete route="{{ route('admin.products.destroy', $product->id) }}"
                                confirm="Bạn có chắc muốn xóa sản phẩm ({{ $product->name }}) ra khỏi hệ thống ?" />
                        </div>
                    </td>

                </tr>
            @endforeach
            @php
                $row_per_page = $products->perPage();
                $current_row = $products->count();
            @endphp
            @for ($i = $current_row + 1; $i <= $row_per_page; $i++)
                <tr class="">
                    <td class="px-3">
                        <div class="w-4 h-4 bg-gray-200 rounded-sm"></div>
                    </td>
                    <td class="px-2">#</td>
                    <td class="px-2 py-2 text-center flex justify-center items-center">
                        <div class="w-[100px] h-[60px] bg-gray-200 rounded-md"></div>
                    </td>
                    <td class="px-2 space-y-2">
                        <div class="w-[70px] h-[10px] bg-gray-200 rounded-sm"></div>
                    </td>
                    <td class="px-2"> 
                        <div class="w-[60px] h-[10px] bg-gray-200 rounded-sm"></div>
                    </td>
                    <td class="px-2">
                        <div class="w-[70px] h-[10px] bg-gray-200 rounded-sm"></div>
                    </td>
                    <td class="px-2">
                        <div class="w-[80px] h-[10px] bg-gray-200 rounded-sm"></div>
                    </td>
                    <td class="px-2">
                        <div class="w-[80px] h-[10px] bg-gray-200 rounded-sm"></div>
                    </td>
                    <td class="px-2">
                        <div class="w-[80px] h-[10px] bg-gray-200 rounded-sm"></div>
                    </td>
                    <td class="px-2 text-center">
                        <div class="w-[120px] h-[10px] bg-gray-200 rounded-sm"></div>
                    </td>
                    <td class="px-2 text-center">
                        <div class="w-[70px] h-[10px] bg-gray-200 rounded-sm"></div>
                    </td>
                </tr>
            @endfor
        </table>
    </div>
    <div class="mt-2">
        {{ $products->links('pagination::tailwind', ['module' => 'products']) }}
    </div>
@else
    <x-list-not-found />
@endif
