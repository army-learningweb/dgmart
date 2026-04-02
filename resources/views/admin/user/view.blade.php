<x-app-layout>

    {{-- flash session --}}
    <x-flash-session.success-flash-session />
    <x-flash-session.failed-flash-session />

    {{-- modal create --}}
    <x-modal-dial.modal-create modal="create-user" title="Tạo mới thành viên" button_create="Tạo mới"
        route="{{ route('admin.users.store') }}">
        <div class="mt-2">
            <x-input-field.field id="create_name" label="Họ tên" type="text" name="name" required="*" />
        </div>

        <div class="mt-2">
            <x-input-field.field id="create_email" label="Email" type="text" name="email" required="*" />
        </div>

        <div class="mt-2">
            <x-input-field.field id="create_password" label="Mật khẩu" type="password" name="password" required="*" />
        </div>

        <div class="mt-2">
            <x-input-field.field id="create_password_confirmation" label="Xác nhận mật khẩu" type="password"
                name="password_confirmation" required="*" />
        </div>

        <input type="hidden" name="modal" value="create">
    </x-modal-dial.modal-create>

    {{-- modal edit --}}
    <x-modal-dial.modal-edit modal="edit-user" title="Cập nhật thông tin thành viên" button_edit="Cập nhật"
        route="{{ route('admin.users.update') }}">
        <div class="mt-2">
            <x-input-field.field id="edit_name" label="Họ tên" type="text" name="name" required="*" />
        </div>

        <div class="mt-2">
            <x-input-field.field id="edit_email" label="Email" type="text" name="email" required="*"
                readonly="readonly" class="dark:bg-red-400" />
        </div>

        <div class="mt-2">
            <x-input-field.field id="edit_password" label="Mật khẩu mới" type="password" name="password" />
        </div>

        <div class="mt-2">
            <x-input-field.field id="edit_password_confirmation" label="Xác nhận mật khẩu" type="password"
                name="password_confirmation" />
        </div>

        <input type="hidden" name="id" value="{{ old('id') }}">
        <input type="hidden" name="modal" value="edit">
    </x-modal-dial.modal-edit>

    <div class="py-4 h-[500px] border-t border-gray-500/50 border-dashed">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-between gap-2 w-full md:w-auto">

                {{-- title --}}
                <div class="text-lg"> Danh sách thành viên </div>

                {{-- create modal --}}
                <x-modal-dial.button-open modal="create-user">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                </x-modal-dial.button-open>
            </div>

            {{-- statis module --}}
            <div class="hidden md:block">
                <x-statis.statis-module module="users" total="{{ $total }}" active="{{ $active }}"
                    unactive="{{ $unactive }}" />
            </div>
        </div>

        <div class="mt-2">
            <form action="{{ route('admin.users.action') }}" method="POST" id="form_action_users">@csrf</form>
            <div class="flex flex-col md:flex-row justify-between gap-2">
                {{-- action --}}
                <div class="flex gap-2 items-center justify-between w-full md:w-auto md:order-1 order-2">
                    <x-form-element.select name="action" class="flex-1" form="form_action_users">
                        <option value="">Hành động hàng loạt</option>
                        <option value="active" {{ old('action') == 'active' ? 'selected' : '' }}>Hoạt động</option>
                        <option value="unactive" {{ old('action') == 'unactive' ? 'selected' : '' }}>Vô hiệu hóa
                        </option>
                    </x-form-element.select>

                    <x-button.button-action class="w-[40%]" form="form_action_users"/>
                </div>

                {{-- filter --}}
                <div class="flex flex-col md:flex-row md:items-center gap-2 md:mt-0 order-1 md:order-2">

                    {{-- search --}}
                    <div>
                        <x-form-element.search placeholder="Tìm kiếm theo tên..." name="search-user" module="users"
                            class="search" />
                    </div>

                    {{-- status --}}
                    <div>
                        <x-form-element.select name="user-filter" module="users" class="select-filter py-1">
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
            <div class="list-users pb-5">
                @include('admin.user.partials.list')
            </div>

        </div>

    </div>
</x-app-layout>
