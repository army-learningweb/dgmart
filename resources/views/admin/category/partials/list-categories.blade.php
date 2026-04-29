@if (count($categories) > 0)
    <div
        class="bg-white shadow-md mt-1 px-5 pb-3 rounded-2xl text-sm overflow-auto scrollbar-thin scrollbar-thumb-rounded-full scrollbar-thumb-gray-400 scrollbar-track-transparent md:max-h-[500px]">
        <table class="min-w-[1000px] md:w-full">
            <tr class="sticky top-0 z-50 bg-white font-semibold">
                <td class="px-3 py-4">
                    <input type="checkbox" name="" id="check_all" class="check_all rounded-[3px] mb-[2px]">
                </td>
                <td class="px-2">Tên danh mục</td>
                <td class="">Slug</td>
                <td class="px-5">Trạng thái</td>
                <td class="px-2">Cập nhật trạng thái</td>
                <td class="px-4">Ngày tạo</td>
                <td class="px-3">Người tạo</td>
                <td class="px-3 text-center">Thao tác</td>
            </tr>
            @foreach ($categories as $item)
                <tr class="border-b border-gray-500/10 hover:bg-[#f5f5f5] animate_tl" style="animation-delay: {{ $loop->index * 0.1 }}s">
                    <td class="px-3 py-4">
                        @if (!in_array($item->id,[1,2]))
                            <input type="checkbox" name="categories_id[]" value="{{ $item->id }}" form="form_action_categories"
                            {{ in_array($item->id, (array) old('categories')) ? 'checked' : '' }}
                            class="check_single rounded-[3px] mb-[2px]">
                        @else
                            ---
                        @endif
                    </td>
                    <td class="px-2 py-4">
                        @if ($item->level == 0)
                            <div class="w-[150px] flex items-center">
                                @if (session('module_active') == 'posts')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5 text-amber-500 shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                </svg>
                                @endif
                                
                                <div class="ml-2 truncate">
                                    {{ $item->name }}
                                </div>
                            </div>
                        @else
                            <div class="w-[150px] flex items-center">
                                <span class="shrink-0 ml-1 mr-2">└</span>
                                <div class="flex-1 min-w-0 truncate">
                                    {{ $item->name }}
                                </div>
                            </div>
                        @endif
                    </td>
                    <td class="">
                        <div class="w-[170px] truncate">
                            {{ $item->slug }}
                        </div>
                    </td>
                    <td class="px-5 status-categories-{{ $type }}s-{{ $item->id }}">
                        <div class="w-[110px]">
                            {!! user_status($item->status) !!}
                        </div>
                    </td>
                    <td class="px-3">
                        <x-table.select name="select-status" module="{{ $type }}s" type="categories"
                            class="select-status shadow-none" data-id="{{ $item->id }}">
                            <option value="active" {{ $item->status == 'active' ? 'selected' : '' }}>Hoạt động</option>
                            <option value="unactive" {{ $item->status == 'unactive' ? 'selected' : '' }}>Vô hiệu hóa
                            </option>
                        </x-table.select>
                    </td>
                    <td class="px-4">{{ $item->created_at->format('d/m/Y') }}</td>
                    <td class="">
                        @if ($item->user)
                            <div class="w-[70px] truncate text-center">
                                {{ $item->user->name }}
                            </div>
                        @else
                            <x-table.unknow/>
                        @endif
                    </td>
                    <td>
                        @if (!in_array($item->id,[1,2]))
                            <div class="flex gap-2 justify-center">
                                <x-table.button-edit button="edit-category" module="{{ $type }}s"
                                    id="{{ $item->id }}" type="categories" />
                                <x-table.button-delete
                                    route="{{ route('admin.' . $type . 's.categories.destroy', $item->id) }}"
                                    confirm="Bạn có chắc muốn xóa danh mục ({{ $item->name }}), Lưu ý Cấp danh mục trước khi xóa, nếu có danh mục con, tất cả sẽ được dời sang danh mục (Lưu trữ)" />
                            </div>
                        @else
                            <div class="text-center">----------</div>
                        @endif
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
@else
    <x-list-not-found />
@endif
