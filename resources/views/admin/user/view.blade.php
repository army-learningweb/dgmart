<x-app-layout>

    {{-- modal --}}
    <x-modal-dial.modal modal="user" title="Tạo mới thành viên" button_create="Tạo thành viên" route="{{ route('admin.users.store') }}">
        <div class="mt-2">
            <x-input-field.field id="name" label="Họ tên" type="text" name="name" />
        </div>

        <div class="mt-2">
            <x-input-field.field id="email" label="Email" type="text" name="email" />
        </div>

        <div class="mt-2">
            <x-input-field.field id="password" label="Mật khẩu" type="password" name="password" />
        </div>

        <div class="mt-2">
            <x-input-field.field id="password_confirmation" label="Xác nhận mật khẩu" type="password" name="password_confirmation" />
        </div>
    </x-modal-dial.modal>

    <div class="bg-white dark:bg-[#18181b] py-4 h-[500px] border-t border-gray-500/30">
        <div class="flex items-center justify-between">

            {{-- title --}}
            <div class="text-[16px]"> Danh sách thành viên </div>

            {{-- option --}}
            <div class="flex items-center gap-2">

                {{-- reset --}}
                <div>
                    <x-button-reset/>
                </div>

                {{-- filter status --}}
                <div>
                    <x-select-filter/>
                </div>

                {{-- create --}}
                <div>
                    <x-button-create modal="user">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5"> <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg>
                    </x-button-create>
                </div>
            
            </div>
        </div>

        {{-- list --}}
        <div class="list-users">
            @include('admin.user.partials.list')
        </div>

    </div>
</x-app-layout>
