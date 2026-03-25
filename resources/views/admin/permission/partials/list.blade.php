@if ($permissions->count() > 0)
    <div
        class="bg-white dark:bg-[#1e1f20] shadow-md mt-4 py-3 px-5 rounded-md text-sm overflow-x-auto md:overflow-visible">
        <table class="min-w-[1000px] md:w-full">

            <tr class="dark:text-gray-300">
                <td class="px-5 pr-10 pb-3">#</td>
                <td class="px-5 pb-3">Tên quyền</td>
                <td class="px-5 pb-3">Mô tả</td>
                <td class="px-5 pb-3">Slug</td>
                <td class="px-3 pb-3">Ngày tạo</td>
                <td class="px-3 pb-3 text-center">Thao tác</td>
            </tr>

            @foreach ($permissions as $module => $permissions)
                <tr class="border-b border-t dark:border-gray-500/10">
                    <td class="py-3" colspan="6">
                        <div
                            class="bg-teal-500/10 dark:text-emerald-400 text-emerald-600 inline-block px-3 py-1 rounded-md">
                            Module {{ ucfirst($module) }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="py-2" colspan="6"></td>
                </tr>
                @php
                    $num = 1;
                @endphp
                @foreach ($permissions as $permission)
                   <tr class="dark:text-gray-300 dark:hover:bg-[#292929] hover:bg-[#f5f5f5]">
                        <td class="px-5 py-1">{{ $num++ }}</td>
                        <td class="px-5 py-1">{{ $permission->name }}</td>
                        <td class="px-5 py-1">{{ $permission->desc }}</td>
                        <td class="px-5 py-1">{{ $permission->slug }}</td>
                        <td class="px-3 py-1">{{ $permission->created_at->format('d/m/Y') }}</td>
                        <td class="px-3 py-1 text-center flex justify-center items-center gap-2">
                            <x-table.button-edit button="edit-permission" module="permissions" id="{{ $permission->id }}" />
                            <x-table.button-delete route="{{ route('admin.permissions.destroy', $permission->id) }}" confirm="Bạn có chắc muốn xóa quyền này ra khỏi hệ thống ?" />       
                        </td>
                    </tr>
                @endforeach
            @endforeach

        </table>
    </div>
@else
    <x-list-not-found />
@endif
