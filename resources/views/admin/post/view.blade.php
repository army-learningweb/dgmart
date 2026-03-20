<x-app-layout>

    {{-- flash session --}}
    <x-success-flash-session/>
    <x-failed-flash-session/>

    {{-- modal create --}}
    {{-- <x-modal-dial.modal-create modal="create-user" title="Tạo mới thành viên" button_create="Tạo thành viên" route="{{ route('admin.users.store') }}">
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

        <input type="hidden" name="modal" value="create">
    </x-modal-dial.modal-create> --}}
    
    {{-- modal edit --}}
    {{-- <x-modal-dial.modal-edit modal="edit-user" title="Cập nhật thông tin thành viên" button_edit="Cập nhật thông tin" route="{{ route('admin.users.update') }}">
        <div class="mt-2">
            <x-input-field.field id="name" label="Họ tên" type="text" name="name" required="*"/>
        </div>

        <div class="mt-2">
            <x-input-field.field id="email" label="Email" type="text" name="email" required="*" readonly="readonly" class="dark:bg-red-400"/>
        </div>

        <div class="mt-2">
            <x-input-field.field id="password" label="Mật khẩu mới" type="password" name="password" />
        </div>

        <div class="mt-2">
            <x-input-field.field id="password_confirmation" label="Xác nhận mật khẩu" type="password" name="password_confirmation" />
        </div>

        <input type="hidden" name="user_id" value="">
        <input type="hidden" name="modal" value="edit">
    </x-modal-dial.modal-edit> --}}


    <div class="dark:bg-[#18181b] py-4 h-[500px] border-t border-gray-500/10">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">

            {{-- title --}}
            <div class="text-lg"> Danh sách bài viết </div>

            {{-- option --}}
            <div class="flex flex-col md:flex-row md:items-center gap-2 mt-3 md:mt-0">

                {{-- search --}}
                <div>
                    <x-search placeholder="Tìm kiếm theo tên..." name="search-post" module="posts" class="search"/>
                </div>

                {{-- filter status --}}
                <div>
                   <x-select name="post-filter" module="posts" class="select-filter py-1">
                        <option value="">Lọc theo trạng thái</option>
                        <option value="active">Hoạt động</option>
                        <option value="unactive">Vô hiệu hóa</option>
                   </x-select>
                </div>

                {{-- create modal --}}
                <div>
                    <x-modal-dial.button-open modal="create-post">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5"> <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg>
                    </x-modal-dial.button-open>
                </div>
                
                {{-- reset --}}
                <div class="hidden md:block">
                    <x-button-reset/>
                </div>
            </div>
        </div>

        <form action="" method="post">
            @csrf 

            {{-- statis & action --}}
            <div class="my-5">
                <div class="flex items-center justify-between">

                    {{-- action --}}
                    <div class="flex flex-col md:flex-row gap-2 md:items-center w-full md:w-auto">
                        <x-select name="action" class="py-[3px]">
                            <option value="">- Hành động hàng loạt</option>
                            <option value="active" {{ old('action') == 'active' ? 'selected' : '' }}>Hoạt động</option>
                            <option value="unactive" {{ old('action') == 'unactive' ? 'selected' : '' }}>Vô hiệu hóa</option>
                        </x-select>

                        <x-primary-button style="padding-top:4px;padding-bottom:4px" class="flex justify-center items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                            </svg>
                            <span>Hành động</span>
                        </x-primary-button>
                    </div>

                    {{-- statis module --}}
                    <div class="hidden md:block">
                        <x-statis-module module="posts" total="" active="" unactive=""/>
                    </div>
                </div>
            </div>

            {{-- list --}}
            <div class="list-posts pb-5">
                {{-- @include('admin.user.partials.list') --}}
            </div>

        </form>

    </div>
</x-app-layout>
