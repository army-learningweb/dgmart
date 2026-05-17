@if ($reviews->count() > 0)
    <div
        class="bg-white shadow-md mt-2 py-3 px-5 rounded-2xl text-sm overflow-x-auto md:overflow-visible scrollbar-thin scrollbar-thumb-rounded-full scrollbar-thumb-gray-400 scrollbar-track-transparent">
        <table class="min-w-[1000px] md:w-full">
            <tr class="font-semibold">
                <td class="px-3 py-3">
                    <input type="checkbox" name="" id="check_all" class="check_all rounded-[3px] mb-[2px]">
                </td>
                <td class="px-3">Sản phẩm</td>
                <td class="px-3">Tên & Bình chọn</td>
                <td class="">Nội dung</td>
                <td class="px-3">Ngày viết đánh giá</td>
                <td class="px-3">Trạng thái</td>
                <td class="px-3">Cập nhật trạng thái</td>
                <td class="px-3 text-center">Thao tác</td>
            </tr>

            @foreach ($reviews as $item)
                <tr class="border-b border-gray-100">
                    <td class="px-3 py-10">
                        <input type="checkbox" name="review_ids[]" value="{{ $item->id }}"
                            form="form_action_reviews"
                            {{ in_array($item->id, (array) old('review_ids')) ? 'checked' : '' }}
                            class="check_single rounded-[3px] mb-[2px]">
                    </td>
                    <td class="px-3">
                        <div class="w-[150px] truncate">
                            {{ $item->product->name }}
                        </div>
                    </td>
                    <td class="px-3">
                        <div class="w-[140px] truncate">
                            {{ $item->name }}
                        </div>
                        <div class="flex gap-1 items-center ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-5 text-amber-500">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>({{ $item->vote }})</span>
                        </div>
                    </td>
                    <td class="">
                        <div class="w-[200px] line-clamp-3">
                            {{ $item->comment }}
                        </div>
                    </td>
                    <td class="px-3">{{ $item->created_at }}</td>
                    <td class="px-1 status-reviews-{{ $item->id }}">
                        
                                {!! review_status($item->status) !!}
                            
                    </td>
                    <td class="px-3">
                        <x-table.select name="select-status" module="reviews" class="ms-2 select-status" data-id="{{ $item->id }}">
                            <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>Chờ xử lí
                            </option>
                            <option value="publish" {{ $item->status == 'publish' ? 'selected' : '' }}>Công khai
                            </option>
                        </x-table.select>
                    </td>
                    <td class="px-3 text-center">
                        <div class="flex justify-center">
                            <x-table.button-delete route="{{ route('admin.reviews.destroy', $item->id) }}"
                                confirm="Bạn có chắc muốn xóa nội dung đánh này ra khỏi hệ thống ?" />
                        </div>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>

    <div class="mt-2">
        {{ $reviews->links('pagination::tailwind', ['module' => 'reviews']) }}
    </div>
@else
    <x-list-not-found />
@endif
