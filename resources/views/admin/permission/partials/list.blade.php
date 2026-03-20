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
                            <div class="open-modal open-modal-edit edit-permission flex justify-center p-1 rounded-md text-[#5d82ee] hover:text-[#4049c8] cursor-pointer"
                                data-id="{{ $permission->id }}" data-modal="edit-permission" data-module="permissions">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </div>
                            <a href="{{ route('admin.permissions.destroy', $permission->id) }}"
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
@else
    <x-list-not-found />
@endif
