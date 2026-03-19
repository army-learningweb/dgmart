<div class="bg-white dark:bg-[#1e1f20] shadow-md mt-4 py-3 px-5 rounded-md text-sm overflow-x-auto md:overflow-visible">
    <table class="min-w-[1000px] md:w-full">

        <tr class="dark:text-gray-300">
            <td class="px-5 pr-10 pb-3">#</td>
            <td class="px-5 pb-3">Tên quyền</td>
            <td class="px-5 pb-3">Mô tả</td>
            <td class="px-5 pb-3">Slug</td>
            <td class="px-3 pb-3">Ngày tạo</td>
            <td class="px-3 pb-3 text-center">Thao tác</td>
        </tr>

        @foreach ($roles as $module => $roles)
            <tr class="border-b border-t dark:border-gray-500/10">
                <td class="py-3" colspan="6">
                    <div
                        class="bg-gradient-to-r dark:text-gray-900 from-amber-400 to-amber-500 inline-block px-3 py-1 rounded-md shadow-md">
                        Module {{ ucfirst($module) }}
                    </div>
                </td>
            </tr>
            <tr><td class="py-2" colspan="6"></td></tr>
            @php
                $num = 1;
            @endphp
            @foreach ($roles as $role)
                <tr>
                    <td class="px-5 pt-1 pb-3">{{ $num++ }}</td>
                    <td class="px-5 pt-1 pb-3">{{ $role->name }}</td>
                    <td class="px-5 pt-1 pb-3">{{ $role->desc }}</td>
                    <td class="px-5 pt-1 pb-3">{{ $role->slug }}</td>
                    <td class="px-3 pt-1 pb-3">{{ $role->created_at->format('d/m/Y') }}</td>
                    <td class="px-3 pb-3 text-center flex justify-center items-center gap-2">
                        <div class="open-modal open-modal-edit edit-role flex justify-center p-1 rounded-md text-[#5d82ee] hover:text-[#4049c8] cursor-pointer"
                            data-id="{{ $role->id }}" data-modal="edit-role" data-module="roles">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </div>
                        <a href="{{ route('admin.roles.destroy', $role->id) }}"
                            onclick="return confirm('Bạn có chắc muốn xóa quyền này ra khỏi hệ thống ?')"
                            class="flex justify-center p-1 text-red-500 hover:text-red-700 rounded-md cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endforeach


    </table>
</div>

{{-- <div class="flex gap-2 items-center mt-5">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
        </svg>
        Không tìm thấy bản ghi nào !
    </div> --}}
