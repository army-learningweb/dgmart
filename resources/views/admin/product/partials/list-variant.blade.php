@if ($variants->count() > 0)
    <div
        class="table-scroll scroll-smooth bg-white shadow-md mt-3 px-5 pb-3 rounded-2xl text-sm md:max-h-[530px] md:overflow-y-auto overflow-x-auto md:overflow-visible scrollbar-thin scrollbar-thumb-rounded-full scrollbar-thumb-gray-400 scrollbar-track-transparent">
        <table class="min-w-[1000px] md:w-full">
            <tr class="sticky top-0 bg-white font-semibold z-40">
                <td class="px-1 py-5">Nhóm</td>
                <td class="pl-10">Tên</td>
                <td class="px-2">Giá</td>
                <td class="px-5">Mô tả</td>
                <td class="px-2">Slug</td>
                <td class="px-3">Ngày tạo</td>
                <td class="px-3 text-center">Thao tác</td>
            </tr>
            @foreach ($variants as $slug => $items)
                <tr class="border-b border-gray-500/10 border-t animate_tl">
                    <td class="py-3" colspan="6">
                        <div
                            class="bg-blue-500/10 text-blue-600 inline-block px-3 py-1 rounded-md">
                            {{ ucfirst($slug) }}
                        </div>
                    </td>
                </tr>
                 <tr class="">
                    <td class="" colspan="6">
                    </td>
                </tr>
                @foreach ($items as $variant)
                   <tr class="hover:bg-[#f5f5f5] animate_tl" style="animation-delay: {{ $loop->index * 0.1 }}s">
                        <td class="px-4 p-3">
                            <input type="checkbox" name="variant_ids[]" value="{{ $variant->id }}" form="form-product-variant"
                                {{ in_array($variant->id, (array) old('variant_ids')) ? 'checked' : '' }}
                                class="rounded-[3px] mb-[2px]">
                        </td>
                        <td class="pl-10">
                            <div class="w-[120px] truncate">
                                 {{ $variant->name }}
                            </div>
                        </td>
                        <td class="px-2">
                            <div class="w-[100px] truncate">
                                 {{ number_format($variant->price) }}đ
                            </div>
                        </td>
                        <td class="px-5">
                            <div class="w-[200px] truncate">
                                {{ $variant->desc }}
                            </div>
                        </td>
                        <td class="px-2">
                            <div class="w-[100px] truncate">
                                {{ $variant->slug }}
                            </div>
                        </td>
                        <td class="px-3">{{ $variant->created_at->format('d/m/Y') }}</td>
                        <td class="px-3">
                            <div class="flex justify-center items-center gap-2">
                                <x-table.button-edit button="edit-variant" module="products" type="variants" id="{{ $variant->id }}" />
                            <x-table.button-delete route="{{ route('admin.products.variants.destroy', $variant->id) }}" confirm="Bạn có chắc muốn thông số này ra khỏi hệ thống ?" />
                            </div>
                                   
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </table>
    </div>
@else
    <x-list-not-found />
@endif
