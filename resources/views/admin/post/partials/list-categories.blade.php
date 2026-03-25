@if (count($categories) > 0)
<div class="bg-white dark:bg-[#1e1f20] shadow-md mt-4 py-3 px-5 rounded-md text-sm overflow-x-auto md:overflow-visible">
    <table class="min-w-[1000px] md:w-full">

        <tr class="dark:text-gray-300">
            <td class="px-3 py-2">
                <input type="checkbox" name="" id="check_all" class="check_all rounded-[3px] mb-[2px]">
                <label for="check_all" class="ms-[2px] text-sm"></label>
            </td>
            <td class="px-5">Danh mục</td>
            <td class="px-5">Slug</td>
            <td class="px-3 text-center">Trạng thái</td>
            <td class="px-3">Cập nhật trạng thái</td>
            <td class="px-3">Ngày tạo</td>
            <td class="px-3">Người tạo</td>
            <td class="px-3 text-center">Thao tác</td>
        </tr>
        @foreach ($categories as $item)
            <tr
                class="dark:text-gray-300 border-b border-gray-500/40 dark:hover:bg-[#292929] hover:bg-[#f5f5f5] {{ $item->level > 0 ? 'hidden' : 'not-children-category' }}">
                <td class="px-3 py-4">
                    @if ($item->level != 0 || $item->id != 9)
                        <input type="checkbox" name="category_id[]" value="{{ $item->id }}"
                            class="check_single rounded-[3px] mb-[2px]">
                    @else
                        ---
                    @endif
                </td>
                <td class="px-5 cursor-pointer parent-category">
                    <div class="flex gap-2 items-center">
                        @if ($item->level == 0)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5 text-amber-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                            </svg>
                            {{ $item->name }}
                        @else
                            <div>
                                <span class="inline-block mr-2 py-[15px]">└</span> {{ $item->name }}
                            </div>
                        @endif
                    </div>
                </td>
                <td class="px-5">{{ $item->slug }}</td>
                <td class="px-5">
                    <div class="flex justify-center status-categories-posts-{{ $item->id }}">
                        {!! user_status($item->status) !!}
                    </div>
                </td>
                <td class="px-3">
                    <x-form-element.select module="posts" type="categories" class="select-status py-[3px] shadow-none text-[12px]"
                        data-id="{{ $item->id }}">
                        <option value="active" {{ $item->status == 'active' ? 'selected' : '' }}>Hoạt động</option>
                        <option value="unactive" {{ $item->status == 'unactive' ? 'selected' : '' }}>Vô hiệu hóa
                        </option>
                    </x-form-element.select>
                </td>
                <td class="px-3">{{ $item->created_at->format('d/m/Y') }}</td>
                <td class="px-3">{{ $item->user->name }}</td>
                <td>
                    @if ($item->id != 9)
                        <div class="flex gap-4 justify-center">
                            <x-table.button-edit button="edit-category" module="posts" id="{{ $item->id }}" type="categories" />
                            
                            <a href="{{ route('admin.posts.categories.destroy', $item->id) }}"
                            @if ($item->level == 0) 
                                onclick="return confirm('Bạn có chắc muốn xóa danh mục này, đây là danh mục cha, các danh mục con sẽ được di dời sang danh mục (Lưu trữ) ?')"
                            @else
                                onclick="return confirm('Bạn có chắc muốn xóa danh mục này ra khỏi hệ thống ?')" 
                            @endif
                                class="flex justify-center p-1 text-red-500 hover:text-red-700 rounded-md cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </a>
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
    <x-list-not-found/>
@endif
