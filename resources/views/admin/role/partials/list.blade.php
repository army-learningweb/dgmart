@if ($roles->count() > 0)
    <div
        class="bg-white dark:bg-[#1e1f20] shadow-md mt-4 py-3 px-5 rounded-md text-sm overflow-x-auto md:overflow-visible">
        <table class="min-w-[1000px] md:w-full">

            <tr class="dark:text-gray-300">
                <td class="px-5 pb-3">#</td>
                <td class="px-5 pb-3">Tên vai trò</td>
                <td class="px-5 pb-3">Mô tả</td>
                <td class="px-3 pb-3">Ngày tạo</td>
                <td class="px-3 pb-3 text-center">Thao tác</td>
            </tr>
            @php
                $num = 1;
            @endphp
            @foreach ($roles as $role)
                <tr class="dark:text-gray-300 border-b border-gray-500/20 dark:hover:bg-[#292929] hover:bg-[#f5f5f5]">
                    <td class="px-5 py-2"> {{ $num++ }} </td>
                    <td class="px-5 py-2">{{ $role->name }}</td>
                    <td class="px-5 py-2">{{ $role->desc }}</td>
                    <td class="px-3 py-2">{{ $role->created_at }}</td>
                    <td class="px-3 py-2 text-center flex justify-center items-center gap-2">
                        <x-table.button-edit button="edit-role" module="roles" id="{{ $role->id }}" />
                        <x-table.button-delete route="{{ route('admin.roles.destroy', $role->id) }}"
                            confirm="Bạn có chắc muốn xóa vai trò này ra khỏi hệ thống ?" />
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
@else
    <x-list-not-found />
@endif
