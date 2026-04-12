@if ($sliders->count() > 0)
    <div
        class="bg-white shadow-md mt-3 py-3 px-5 rounded-md text-sm overflow-x-auto md:overflow-visible scrollbar-thin scrollbar-thumb-rounded-full scrollbar-thumb-gray-400 scrollbar-track-transparent">
        <table class="min-w-[1000px] md:w-full">
            <tr>
                <td class="px-3 py-2">
                    <input type="checkbox" name="" id="check_all" class="check_all rounded-[3px] mb-[2px]">
                </td>
                <td class="px-3">#</td>
                <td class="text-center">Ảnh</td>
                <td class="px-5">Tiêu đề</td>
                <td class="px-5">Mô tả</td>
                <td class="px-4">Thứ tự</td>
                <td class="px-3">Trạng thái</td>
                <td class="px-1">Cập nhật trạng thái</td>
                <td class="px-3">Người tạo</td>
                <td class="px-3 text-center">Thao tác</td>
            </tr>

            @foreach ($sliders as $item)
                <tr class="border-b border-gray-500/20 hover:bg-[#f5f5f5]">
                    <td class="px-3 py-4">
                        <input type="checkbox" name="banners_id[]" value="{{ $item->id }}"
                            form="form_action_sliders"
                            {{ in_array($item->id, (array) old('banners_id')) ? 'checked' : '' }}
                            class="check_single rounded-[3px] mb-[2px]">
                    </td>
                    <td class="px-3">{{ $loop->iteration }}</td>
                    <td class="px-4 py-[10px]">
                        @if (!empty($item->media->where('object_id', $item->id)->where('type', 'slider')->value('url')))
                            <div class="flex justify-center items-center">
                                <img src="{{ asset($item->media->where('object_id', $item->id)->where('type', 'slider')->value('url')) }}"
                                    alt="" class="w-[100px] h-[60px] object-cover rounded-md shadow-sm">
                            </div>
                        @else
                            <x-table.unknow />
                        @endif
                    </td>
                    <td class="px-5">
                        @if ($item->title)
                            <div class="w-[100px] truncate">{{ $item->title }}</div>
                        @else
                            <div class="text-gray-500 italic">Chưa có tiêu đề</div>
                        @endif
                    </td>
                    <td class="px-5">
                        @if ($item->desc)
                            <div class="w-[100px] truncate"> {{ $item->desc }} </div>
                        @else
                            <div class="text-gray-500 italic">Chưa có mô tả</div>
                        @endif
                    </td>
                    <td class="px-3">
                        <input type="number" name="change-order" value="{{ $item->order }}"
                            data-id="{{ $item->id }}" data-module="sliders"
                            class="change-order border-0 focus:ring-0 focus:outline-0 rounded-md w-[60px] cursor-pointer [&::-webkit-inner-spin-button]:opacity-100 [&::-webkit-inner-spin-button]:block"
                            min="1" max="10">
                    </td>
                    <td class="px-3 status-sliders-{{ $item->id }}">
                        <div class="w-[100px]">
                            {!! user_status($item->status) !!}
                        </div>
                    </td>
                    <td class="px-1">
                        <x-table.select name="select-status" module="sliders" class="select-status"
                            data-id="{{ $item->id }}">
                            <option value="active" {{ $item->status == 'active' ? 'selected' : '' }}>Hoạt động
                            </option>
                            <option value="unactive" {{ $item->status == 'unactive' ? 'selected' : '' }}>Vô hiệu hóa
                            </option>
                        </x-table.select>
                    </td>
                    <td class="px-3">
                        @if ($item->user)
                            {{ $item->user->name }}
                        @else
                            <x-table.unknow />
                        @endif

                    </td>
                    <td class="px-3 text-center">
                        <div class="flex justify-center items-center gap-2 h-full">
                            <x-table.button-edit button="edit-slider" module="sliders" id="{{ $item->id }}" />
                            <x-table.button-delete route="{{ route('admin.sliders.destroy', $item->id) }}"
                                confirm="Bạn có chắc muốn xóa ảnh này ra khỏi hệ thống ?" />
                        </div>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
@else
    <x-list-not-found />
@endif
