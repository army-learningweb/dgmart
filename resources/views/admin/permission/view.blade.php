<x-app-layout>

    {{-- flash session --}}
    <x-flash-session.success-flash-session/>
    <x-flash-session.failed-flash-session/>

    {{-- modal create --}}
    <x-modal-dial.modal-create modal="create-permission" title="Tạo quyền mới" button_create="Tạo quyền" route="{{ route('admin.permissions.store') }}">
        <div class="mt-2">
            <x-input-field.field id="name" label="Tên quyền" type="text" name="name" required="*" />
            <span class="text-gray-400 text-xs">Ví dụ: Edit Post</span>
        </div>

        <div class="mt-2">
            <x-input-field.field id="slug" label="Slug" type="text" name="slug" required="*"/>
            <span class="text-gray-400 text-xs">Ví dụ: edit.post</span>
        </div>

        <div class="mt-2">
            <x-form-element.text-area id="desc" label="Mô tả" name="desc" required="*"></x-form-element.text-area>
            <span class="text-gray-400 text-xs">Ví dụ: Chỉnh sửa bài viết</span>
        </div>

        <input type="hidden" name="modal" value="create">
    </x-modal-dial.modal-create>

    {{-- modal-edit --}}
    <x-modal-dial.modal-edit modal="edit-permission" title="Cập nhật thông tin quyền" button_edit="Cập nhật thông tin" route="{{ route('admin.permissions.update') }}">
        <div class="mt-2">
            <x-input-field.field id="name" label="Tên quyền" type="text" name="name" required="*" />
            <span class="text-gray-400 text-xs">Ví dụ: Edit Post</span>
        </div>

        <div class="mt-2">
            <x-input-field.field id="slug" label="Slug" type="text" name="slug" required="*"/>
            <span class="text-gray-400 text-xs">Ví dụ: edit.post</span>
        </div>

        <div class="mt-2">
            <x-form-element.text-area id="desc" label="Mô tả" name="desc" required="*"></x-form-element.text-area>
            <span class="text-gray-400 text-xs">Ví dụ: Chỉnh sửa bài viết</span>
        </div>

        <input type="hidden" name="id" value="{{ session('user_id') ? session('user_id') : '' }}">
        <input type="hidden" name="modal" value="edit">

    </x-modal-dial.modal-edit>

    <div class="dark:bg-[#18181b] py-4 h-[500px] border-t border-gray-500/50 border-dashed">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">

            {{-- title --}}
            <div class="text-lg"> Danh sách quyền </div>

            {{-- option --}}
            <div class="flex flex-col md:flex-row md:items-center gap-2 mt-3 md:mt-0">
     
                {{-- create modal --}}
                <div>
                    <x-modal-dial.button-open modal="create-permission">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                        </svg>
                    </x-modal-dial.button-open>
                </div>
                
            </div>
        </div>

        <form action="" method="post">
            @csrf 
           
            {{-- list --}}
            <div class="list-permissions pb-5">
                @include('admin.permission.partials.list')
            </div>

        </form>

    </div>
</x-app-layout>
