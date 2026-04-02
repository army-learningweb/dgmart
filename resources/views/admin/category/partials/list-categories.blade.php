@if (count($categories) > 0)
    <div
        class="bg-white dark:bg-[#1e1f20] shadow-md mt-3 py-3 px-5 rounded-md text-sm overflow-auto scrollbar-thin scrollbar-thumb-rounded-full scrollbar-thumb-gray-400 scrollbar-track-transparent md:max-h-[540px]">
        <table class="min-w-[1000px] md:w-full">
            <tr class="dark:text-gray-300">
                <td class="px-3 py-2">
                    <input type="checkbox" name="" id="check_all" class="check_all rounded-[3px] mb-[2px]">
                </td>
                <td class="px-3 py-2">#</td>
                <td class="px-3">Danh mục</td>
                <td class="px-5">Slug</td>
                <td class="px-3 text-center">Trạng thái</td>
                <td class="px-3">Cập nhật trạng thái</td>
                <td class="px-3">Ngày tạo</td>
                <td class="px-3">Người tạo</td>
                <td class="px-3 text-center">Thao tác</td>
            </tr>
            @foreach ($categories as $item)
                <tr class="dark:text-gray-300 border-b border-gray-500/20 dark:hover:bg-[#292929] hover:bg-[#f5f5f5]">
                    <td class="px-3 py-4">
                        @if (!in_array($item->id,[1,2]))
                            <input type="checkbox" name="categories_id[]" value="{{ $item->id }}" form="form_action_categories"
                            {{ in_array($item->id, (array) old('categories')) ? 'checked' : '' }}
                            class="check_single rounded-[3px] mb-[2px]">
                        @else
                            ---
                        @endif
                        
                    </td>
                    <td class="px-3"> {{ $loop->iteration }}</td>
                    <td class="px-3 py-4">
                        @if ($item->level == 0)
                            <div class="w-[150px] flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5 text-amber-500 shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                </svg>
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
                    <td class="px-5">
                        <div class="w-[120px] truncate">
                            {{ $item->slug }}
                        </div>
                    </td>
                    <td class="px-5">
                        <div class="flex justify-center status-categories-{{ $type }}s-{{ $item->id }}">
                            {!! user_status($item->status) !!}
                        </div>
                    </td>
                    <td class="px-3">
                        <x-table.select module="{{ $type }}s" type="categories"
                            class="select-status shadow-none" data-id="{{ $item->id }}">
                            <option value="active" {{ $item->status == 'active' ? 'selected' : '' }}>Hoạt động</option>
                            <option value="unactive" {{ $item->status == 'unactive' ? 'selected' : '' }}>Vô hiệu hóa
                            </option>
                        </x-table.select>
                    </td>
                    <td class="px-3">{{ $item->created_at->format('d/m/Y') }}</td>
                    <td class="px-3">
                        @if ($item->user)
                            <div class="w-[70px] line-clamp-1">
                                {{ $item->user->name }}
                            </div>
                        @else
                            <x-table.unknow/>
                        @endif
                    </td>
                    <td>
                        @if (!in_array($item->id,[1,2]))
                            <div class="flex gap-4 justify-center">
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
