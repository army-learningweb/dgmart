<x-app-layout>

    {{-- flash session --}}
    <x-success-flash-session />
    <x-failed-flash-session />

    {{-- modal create --}}
    <x-modal-dial.modal-create modal="create-role" title="Tạo vai trò mới" button_create="Tạo vai trò"
        route="{{ route('admin.roles.store') }}">
        <div class="mt-2">
            <x-input-field.field id="name" label="Tên vai trò" type="text" name="name" required="*" />
            <span class="text-gray-400 text-xs">Ví dụ: Post Manager</span>
        </div>

        <div class="mt-2">
            <x-text-area id="desc" label="Mô tả" name="desc" required="*"></x-text-area>
            <span class="text-gray-400 text-xs">Ví dụ: Quản lí bài viết</span>
        </div>

        <div class="my-2">
            <p>Vai trò này có quyền gì ?</p>
        </div>

        <div class="h-[160px] pl-1 overflow-y-auto overflow-x-hidden">
            <div class="min-w-[700px]">
                @foreach ($permissions as $module => $permission_list)
                    <div class="border-t border-gray-500/50 parent_check_all">
                        <div class="py-2" colspan="4">
                            <div class="flex items-center gap-3">
                                <input type="checkbox" class="check_all_permission rounded-sm">
                                <span class="text-emerald-500">Module {{ ucfirst($module) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-4">
                        @foreach ($permission_list as $permisison)
                            <div class="py-3 col-span-1">
                                <div class="flex items-center gap-3">
                                    <input type="checkbox" name="permission_id[]" value="{{ $permisison->id }}"
                                        class="check_single_permission rounded-sm">
                                    <span>{{ $permisison->name }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

        <input type="hidden" name="modal" value="create">
    </x-modal-dial.modal-create>

    <x-modal-dial.modal-edit modal="edit-role" title="Cập nhật thông tin vai trò" button_edit="Cập nhật thông tin"
        route="{{ route('admin.roles.update') }}">
        <div class="mt-2">
            <x-input-field.field id="name" label="Tên vai trò" type="text" name="name" required="*" />
            <span class="text-gray-400 text-xs">Ví dụ: Post Manager</span>
        </div>

        <div class="mt-2">
            <x-text-area id="desc" label="Mô tả" name="desc" required="*"></x-text-area>
            <span class="text-gray-400 text-xs">Ví dụ: Quản lí bài viết</span>
        </div>

        <div class="my-2">
            <p>Vai trò này có quyền gì ?</p>
        </div>

        <div class="h-[160px] pl-1 overflow-y-auto overflow-x-hidden">
            <div class="min-w-[700px]">
                @foreach ($permissions as $module => $permissions_list)
                    <div class="border-t border-gray-500/50 parent_check_all">
                        <div class="py-2" colspan="4">
                            <div class="flex items-center gap-3">
                                <input type="checkbox" class="check_all_permission rounded-sm">
                                <span class="text-emerald-500">Module {{ ucfirst($module) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-4">
                        @foreach ($permissions_list as $permisison)
                            <div class="py-3 col-span-1">
                                <div class="flex items-center gap-3">
                                    <input type="checkbox" name="permission_id[]" value="{{ $permisison->id }}"
                                        class="check_single_permission rounded-sm">
                                    <span>{{ $permisison->name }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

        <input type="hidden" name="role_id" value="">
        <input type="hidden" name="modal" value="edit">

    </x-modal-dial.modal-edit>

    <div class="dark:bg-[#18181b] py-4 h-[500px] border-t border-gray-500/10">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">

            {{-- title --}}
            <div class="text-lg"> Danh sách vai trò </div>

            {{-- option --}}
            <div class="flex flex-col md:flex-row md:items-center gap-2 mt-3 md:mt-0">

                {{-- create modal --}}
                <div>
                    <x-modal-dial.button-open modal="create-role">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                        </svg>
                    </x-modal-dial.button-open>
                </div>

            </div>
        </div>

        <form action="" method="post">
            @csrf

            {{-- list --}}
            <div class="list-roles pb-5">
                @include('admin.role.partials.list')
            </div>

        </form>

    </div>
</x-app-layout>
