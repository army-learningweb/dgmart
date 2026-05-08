@if ($attrs->count() > 0)
    <div
        class="table-scroll scroll-smooth bg-white shadow-md mt-3 px-5 pb-3 rounded-2xl text-sm md:max-h-[530px] md:overflow-y-auto overflow-x-auto md:overflow-visible scrollbar-thin scrollbar-thumb-rounded-full scrollbar-thumb-gray-400 scrollbar-track-transparent">
        <table class="min-w-[1000px] md:w-full">
            <tr class="sticky top-0 bg-white font-semibold z-40">
                <td class="pl-4 py-4">
                    <input type="checkbox" name="" id="check_all" class="check_all rounded-[3px] mb-[2px]">
                    <label for="check_all" class="ms-[2px] text-sm"></label>
                </td>
                <td class="px-10">Tên</td>
                <td class="px-2">Mô tả</td>
                <td class="px-3">Ngày tạo</td>
                <td class="px-3 text-center">Thao tác</td>
            </tr>
            @foreach ($attrs as $item)
                <tr class="hover:bg-[#f5f5f5] border-b border-gray-500/10 animate_tl" style="animation-delay: {{ $loop->index * 0.1 }}s">
                    <td class="pl-4 py-4">
                        <input type="checkbox" name="attrs[]" value="{{ $item->id }}" form="form-attr-action"
                            {{ in_array($item->id, (array) old('attrs')) ? 'checked' : '' }}
                            class="check_single rounded-[3px] mb-[2px]">
                    </td>
                    <td class="px-10">
                        <div class="w-[70px] truncate">
                            {{ $item->name }}
                        </div>
                    </td>
                    <td class="px-2">
                        <div class="w-[150px] truncate">
                            {{ $item->desc }}
                        </div>
                    </td>
                    <td class="px-3">{{ $item->created_at->format('d/m/Y') }}</td>
                    <td class="px-3">
                        <div class="flex justify-center items-center gap-2">
                            <x-table.button-edit button="edit-product-attr" module="products" type="attributes"
                                id="{{ $item->id }}" />
                            <x-table.button-delete route="{{route('admin.products.attributes.destroy',$item->id)}}"
                                confirm="Bạn có chắc muốn xóa cấu hình này ra khỏi hệ thống ?" />
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@else
    <x-list-not-found />
@endif
