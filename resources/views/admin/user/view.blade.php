<x-app-layout>

    {{-- flash session --}}
    <x-success_flash_session/>

    {{-- modal create --}}
    <x-modal-dial.modal-create modal="create-user" title="Tạo mới thành viên" button_create="Tạo thành viên" route="{{ route('admin.users.store') }}">
        <div class="mt-2">
            <x-input-field.field id="name" label="Họ tên" type="text" name="name" required="*" />
        </div>

        <div class="mt-2">
            <x-input-field.field id="email" label="Email" type="text" name="email" required="*"/>
        </div>

        <div class="mt-2">
            <x-input-field.field id="password" label="Mật khẩu" type="password" name="password" required="*" />
        </div>

        <div class="mt-2">
            <x-input-field.field id="password_confirmation" label="Xác nhận mật khẩu" type="password" name="password_confirmation" required="*" />
        </div>

        <input type="hidden" name="modal" value="create-user">
    </x-modal-dial.modal-create>
    
    {{-- modal edit --}}
    <x-modal-dial.modal-edit modal="edit-user" title="Cập nhật thông tin thành viên" button_edit="Cập nhật thông tin" route="{{ route('admin.users.update') }}">
        <div class="mt-2">
            <x-input-field.field id="name" label="Họ tên" type="text" name="name" required="*"/>
        </div>

        <div class="mt-2">
            <x-input-field.field id="email" label="Email" type="text" name="email" required="*" readonly="readonly" class="bg-red-500"/>
        </div>

        <div class="mt-2">
            <x-input-field.field id="password" label="Mật khẩu mới" type="password" name="password" />
        </div>

        <div class="mt-2">
            <x-input-field.field id="password_confirmation" label="Xác nhận mật khẩu" type="password" name="password_confirmation" />
        </div>

        <input type="hidden" name="user_id" value="">
        <input type="hidden" name="modal" value="edit-user">
    </x-modal-dial.modal-edit>


    <div class="bg-white dark:bg-[#18181b] py-4 h-[500px] border-t border-gray-500/30">
        <div class="flex items-center justify-between">

            {{-- title --}}
            <div class="text-[17px]"> Danh sách thành viên </div>

            {{-- option --}}
            <div class="flex items-center gap-2">

                {{-- search --}}
                <div>
                    <form action="" method="get">
                        <div class="flex items-center border border-gray-500 dark:bg-[#1e1f20] rounded-md pl-2 w-[250px]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                            <input type="search" placeholder="Tìm kiếm theo tên..." name="" id="" class="w-full py-1 rounded-md bg-transparent border-none text-sm focus:ring-0 focus:border-none">
                        </div>
                    </form>
                </div>


                {{-- filter status --}}
                <div>
                   <x-select name="user-filter" module="users" class="select-filter">
                        <option value="">Lọc theo trạng thái</option>
                        <option value="active">Hoạt động</option>
                        <option value="unactive">Vô hiệu hóa</option>
                   </x-select>
                </div>

                {{-- create modal --}}
                <div>
                    <x-modal-dial.button-open modal="create-user">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5"> <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg>
                    </x-modal-dial.button-open>
                </div>
                
                 {{-- reset --}}
                <div>
                    <x-button-reset/>
                </div>
            </div>
        </div>

        {{-- list --}}
        <div class="list-users">
            @include('admin.user.partials.list')
        </div>

    </div>
</x-app-layout>
