<x-app-layout>

    {{-- flash session --}}
    <x-success-flash-session />
    <x-failed-flash-session />

    {{-- modal create --}}
    <x-modal-dial.modal-create modal="create-post-category" title="Tạo mới danh mục" button_create="Tạo danh mục" route="{{ route('admin.posts.categories.store') }}">
        <div class="mt-2">
            <x-input-field.field id="name" label="Tên danh mục" type="text" name="name" required="*" />
        </div>

        <div class="mt-2">
            <x-input-field.field id="slug" label="Slug" type="text" name="slug" required="*"/>
            <span class="text-gray-400 text-xs">Ví dụ: cong-nghe-open-ai</span>
            <span class="text-green-600 text-xs">( Dán tên vào Slug hệ thống tự xử lí )</span>
        </div>

        <div class="mt-2">
            <label for="parent_category">Chọn danh mục cha</label>
            <x-select id="parent_category" name="parent_category" class="py-[5px] shadow-none text-[12px] md:w-full my-1">
                <option value="">- Chọn</option>
            </x-select>
            <span class="text-amber-600 text-xs">Lưu ý: Để " trống " nếu bạn đang tạo danh mục Cha</span>
        </div>

        <input type="hidden" name="modal" value="create">
    </x-modal-dial.modal-create>

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
            <div class="text-lg"> Danh mục bài viết </div>

            {{-- option --}}
            <div class="flex flex-col md:flex-row md:items-center gap-2 mt-3 md:mt-0">

                {{-- create modal --}}
                <div>
                    <x-modal-dial.button-open modal="create-post-category">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 0 0 2.25-2.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v2.25A2.25 2.25 0 0 0 6 10.5Zm0 9.75h2.25A2.25 2.25 0 0 0 10.5 18v-2.25a2.25 2.25 0 0 0-2.25-2.25H6a2.25 2.25 0 0 0-2.25 2.25V18A2.25 2.25 0 0 0 6 20.25Zm9.75-9.75H18a2.25 2.25 0 0 0 2.25-2.25V6A2.25 2.25 0 0 0 18 3.75h-2.25A2.25 2.25 0 0 0 13.5 6v2.25a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                    </x-modal-dial.button-open>
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
                            <option value="unactive" {{ old('action') == 'unactive' ? 'selected' : '' }}>Vô hiệu hóa
                            </option>
                        </x-select>

                        <x-primary-button style="padding-top:4px;padding-bottom:4px"
                            class="flex justify-center items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                            </svg>
                            <span>Hành động</span>
                        </x-primary-button>
                    </div>

                    {{-- statis module --}}
                    <div class="hidden md:block">
                        <x-statis-module module="posts" total="" active="" unactive="" />
                    </div>
                </div>
            </div>

            {{-- list --}}
            <div class="list-posts-categories pb-5">
                @include('admin.post.partials.list-categories')
            </div>

        </form>

    </div>
</x-app-layout>
