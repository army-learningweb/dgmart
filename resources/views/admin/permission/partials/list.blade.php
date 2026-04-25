@if ($permissions->count() > 0)
    <div
        class="bg-white shadow-md mt-3 pb-3 px-5 rounded-2xl text-sm md:max-h-[530px] md:overflow-y-auto overflow-x-auto md:overflow-visible scrollbar-thin scrollbar-thumb-rounded-full scrollbar-thumb-gray-400 scrollbar-track-transparent">
        <table class="min-w-[1000px] md:w-full">
            <tr class="sticky top-0 bg-white font-semibold">
                <td class="px-5 py-5">#</td>
                <td class="px-5">Tên quyền</td>
                <td class="px-5">Mô tả</td>
                <td class="px-5">Slug</td>
                <td class="px-3">Ngày tạo</td>
                <td class="px-3 text-center">Thao tác</td>
            </tr>
            
            @foreach ($permissions as $module => $permissions)
                <tr class="border-b border-t">
                    <td class="py-3" colspan="6">
                        <div
                            class="bg-blue-500/10 text-blue-600 inline-block px-3 py-1 rounded-md">
                            {{ ucfirst($module) }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="py-2" colspan="6"></td>
                </tr>
                @foreach ($permissions as $permission)
                   <tr class="hover:bg-[#f5f5f5]">
                        <td class="px-5 py-1">{{ $loop->iteration }}</td>
                        <td class="px-5 py-1">
                            <div class="w-[100px] truncate">
                                 {{ $permission->name }}
                            </div>
                        </td>
                        <td class="px-5 py-1">
                            <div class="w-[150px] truncate">
                                {{ $permission->desc }}
                            </div>
                        </td>
                        <td class="px-5 py-1">
                            <div class="w-[100px] truncate">
                                {{ $permission->slug }}
                            </div>
                        </td>
                        <td class="px-3 py-1">{{ $permission->created_at->format('d/m/Y') }}</td>
                        <td class="px-3 py-1 text-center flex justify-center items-center gap-2">
                            <x-table.button-edit button="edit-permission" module="permissions" id="{{ $permission->id }}" />
                            <x-table.button-delete route="{{ route('admin.permissions.destroy', $permission->id) }}" confirm="Bạn có chắc muốn xóa quyền này ra khỏi hệ thống ?" />       
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td class="py-2" colspan="6"></td>
                </tr>
            @endforeach

        </table>
    </div>
@else
    <x-list-not-found />
@endif
