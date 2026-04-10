<x-app-layout>

    {{-- flash session --}}
    <x-flash-session.success-flash-session />
    <x-flash-session.failed-flash-session />

    {{-- modal create --}}
    <x-modal-dial.modal-create modal="create-role" title="Tạo vai trò mới" button_create="Tạo mới"
        route="{{ route('admin.roles.store') }}" width="md:max-w-[700px]" variant="md:max-h-[700px]">
        <div class="mt-2">
            <x-input-field.field id="name" label="Tên vai trò" type="text" name="name" required="*" autocomplete="on"/>
            <span class="text-gray-400 text-xs">Ví dụ: Post Manager</span>
        </div>

        <div class="mt-2">
            <x-form-element.text-area id="desc" label="Mô tả" name="desc"
                required="*"></x-form-element.text-area>
            <span class="text-gray-400 text-xs">Ví dụ: Quản lí bài viết</span>
        </div>

        <div class="my-2">
            <p>Vai trò này có quyền gì ?</p>
        </div>

        <div>
            @include('admin.role.partials.permissions')
        </div>

        <input type="hidden" name="modal" value="create">
    </x-modal-dial.modal-create>

    {{-- modal-edit --}}
    <x-modal-dial.modal-edit modal="edit-role" title="Cập nhật thông tin vai trò" button_edit="Cập nhật"
        route="{{ route('admin.roles.update') }}" width="md:max-w-[700px]" variant="md:max-h-[700px]">
        <div class="mt-2">
            <x-input-field.field id="name" label="Tên vai trò" type="text" name="name" required="*" autocomplete="on"/>
            <span class="text-gray-400 text-xs">Ví dụ: Post Manager</span>
        </div>

        <div class="mt-2">
            <x-form-element.text-area id="desc" label="Mô tả" name="desc"
                required="*"></x-form-element.text-area>
            <span class="text-gray-400 text-xs">Ví dụ: Quản lí bài viết</span>
        </div>

        <div class="my-2">
            <p>Vai trò này có quyền gì ?</p>
        </div>

        <div>
            @include('admin.role.partials.permissions')
        </div>


        <input type="hidden" name="id" value="">
        <input type="hidden" name="modal" value="edit">
    </x-modal-dial.modal-edit>

    {{-- ============================== --}}
    <div class="py-4 border-t border-gray-500/50 border-dashed">
        <div class="flex items-center justify-between md:justify-normal gap-2">
            {{-- title --}}
            <div class="text-lg"> Danh sách vai trò </div>

            {{-- create modal --}}
            <x-modal-dial.button-open modal="create-role">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                </svg>
            </x-modal-dial.button-open>
        </div>

        {{-- list --}}
        <div class="list-roles pb-5">
            @include('admin.role.partials.list')
        </div>

    </div>
</x-app-layout>
