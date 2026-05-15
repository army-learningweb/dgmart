@if (count($list) > 0)
    <div
        class="bg-white shadow-md mt-2 px-5 pb-3 rounded-2xl text-sm overflow-auto scrollbar-thin scrollbar-thumb-rounded-full scrollbar-thumb-gray-400 scrollbar-track-transparent md:max-h-[490px]">
        <table class="min-w-[1000px] md:w-full">
            <tr class="sticky top-0 bg-white font-semibold">
                <td class="px-3 py-4">
                    <input type="checkbox" name="" id="check_all" class="check_all rounded-[3px] mb-[2px]">
                </td>
                <td class="px-2">Tên Link</td>
                <td class="px-2">Slug</td>
                <td class="px-4">Thứ tự</td>
                <td class="px-9">Trạng thái</td>
                <td class="px-2">Cập nhật trạng thái</td>
                <td class="px-4">Ngày tạo</td>
                <td class="px-3">Người tạo</td>
                <td class="px-3 text-center">Thao tác</td>
            </tr>
            @foreach ($list as $item)
                <tr class="border-b border-gray-500/10 hover:bg-[#f5f5f5] {{ session('failed') ? '' : 'animate_tl' }}" style="animation-delay: {{ $loop->index * 0.1 }}s">
                    <td class="px-3 py-4">
                        <input type="checkbox" name="menus_id[]" value="{{ $item->id }}" form="form_action_menus"
                            {{ in_array($item->id, (array) old('menus_id')) ? 'checked' : '' }}
                            class="check_single rounded-[3px] mb-[2px]">
                    </td>
                    <td class="px-2 py-4">
                        @if ($item->level == 0)
                            <div class="w-[150px] flex items-center">
                                <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                                <div class="ml-2 truncate">
                                    {{ $item->name }}
                                </div>
                            </div>
                        @else
                            <div class="w-[150px] flex items-center">
                                <span class="shrink-0 mr-2">└</span>
                                <div class="flex-1 min-w-0 truncate">
                                    {{ $item->name }}
                                </div>
                            </div>
                        @endif
                    </td>
                    <td class="px-2">
                        <div class="w-[120px] truncate">
                            {{ $item->slug }}
                        </div>
                    </td>
                     <td class="px-3">
                        <input type="number" name="change-order" value="{{ $item->order }}"
                            data-id="{{ $item->id }}" data-module="menus"
                            class="change-order border-0 focus:ring-0 focus:outline-0 rounded-md w-[60px] cursor-pointer [&::-webkit-inner-spin-button]:opacity-100 [&::-webkit-inner-spin-button]:block"
                            min="1" max="10">
                    </td>
                    <td class="px-5 status-menus-{{ $item->id }}">
                        <div class="w-[110px]">
                            {!! user_status($item->status) !!}
                        </div>
                    </td>
                    <td class="px-3">
                        <x-table.select name="select-status" module="menus"
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
                            <x-table.unknow />
                        @endif
                    </td>
                    <td>
                        <div class="flex gap-2 justify-center">
                            <x-table.button-edit button="edit-menu" module="menus" id="{{ $item->id }}" />
                            <x-table.button-delete route="{{ route('admin.menus.destroy',$item->id) }}"
                                confirm="Bạn có chắc muốn xóa Link ({{ $item->name }}), Lưu ý Cấp menu trước khi xóa, xóa link cha sẽ xóa tất cả link con" />
                        </div>

                    </td>
                </tr>
            @endforeach

        </table>
    </div>
@else
    <x-list-not-found />
@endif
