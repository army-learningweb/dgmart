<x-app-layout>

    {{-- flash session --}}
    <x-flash-session.success-flash-session />
    <x-flash-session.failed-flash-session />

    {{-- modal create --}}
    <x-modal-dial.modal-create modal="create-post" title="Tạo mới bài viết" button_create="Tạo mới"
        route="{{ route('admin.posts.store') }}" width="w-[1100px]" variant="md:h-[500px] p-2 overflow-y-auto ">

        <div class="flex gap-2">
            <div class="md:w-[70%]">
                <div class="mt-2">
                    <x-form-element.text-area label="Tiêu đề" name="title" id="title" required="*" />
                </div>

                <div class="mt-2">
                    <x-form-element.text-area label="Mô tả" name="desc" id="desc" required="*" />
                </div>
            </div>
            <div class="md:flex-1">
                <x-form-element.file name="post-file" type="post"/>

                <div class="mt-1">
                    <label for="category_id">Danh mục bài viết <span class="text-red-500">*</span></label>
                    <select name="category_id" id="category_id" class="mt-1 rounded-md py-[7px] md:py-[3px] text-sm shadow-sm border-gray-500/30 w-full">
                        <option value="">Chọn danh mục</option>
                        @include('admin.post.partials.parent_categories')
                    </select>
                    <x-input-field.error_php name="category_id" />
                </div>
            </div>
        </div>

        <div class="mt-2">
            {{-- <x-forms.tinymce-editor id="post-content" name="content" /> --}}
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

    {{-- ============================== --}}
    <div class="py-4 h-[500px] border-t border-gray-500/50 border-dashed">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-between gap-2 w-full md:w-auto">

                {{-- title --}}
                <div class="text-lg"> Danh sách bài viết </div>

                {{-- create modal --}}
                <x-modal-dial.button-open modal="create-post">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                </x-modal-dial.button-open>
            </div>

            {{-- statis module --}}
            <div class="hidden md:block">
                <x-statis.statis-module module="posts" total="0" active="0" unactive="0" />
            </div>
        </div>

        <div class="mt-2">
            <form action="" method="post">
                @csrf

                <div class="flex flex-col md:flex-row justify-between gap-2">

                    {{-- action --}}
                    <div class="flex gap-2 items-center justify-between md:w-auto md:order-1 order-2">
                        <x-form-element.select name="action" class="flex-1">
                            <option value="">Hành động hàng loạt</option>
                            <option value="active" {{ old('action') == 'active' ? 'selected' : '' }}>Hoạt động</option>
                            <option value="unactive" {{ old('action') == 'unactive' ? 'selected' : '' }}>Vô hiệu hóa
                            </option>
                        </x-form-element.select>

                        <x-button.button-action class="w-[40%]" />
                    </div>

                    {{-- filter --}}
                    <div class="flex flex-col md:flex-row md:items-center gap-2 md:mt-0 order-1 md:order-2">

                        {{-- search --}}
                        <div>
                            <x-form-element.search placeholder="Tìm kiếm theo tiêu đề..." name="search-post"
                                module="posts" class="search" />
                        </div>

                        {{-- status --}}
                        <div>
                            <x-form-element.select name="post-filter" module="posts" class="select-filter py-1">
                                <option value="">Lọc theo trạng thái</option>
                                <option value="active">Hoạt động</option>
                                <option value="unactive">Vô hiệu hóa</option>
                            </x-form-element.select>
                        </div>

                        {{-- reset --}}
                        <div class="hidden md:block">
                            <x-button.button-reset />
                        </div>

                    </div>
                </div>

                {{-- list --}}
                <div class="list-posts pb-5">
                    @include('admin.post.partials.list')
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
