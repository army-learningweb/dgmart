<x-form-layout>
    <form method="POST" action="{{ route('dang-ky-thanh-vien.store') }}">
        @csrf

        <div>
            <x-input-field.field label="Họ và tên" type="text" name="name" id="name"
                required="*" autocomplete="on" />
        </div>

        <div class="mt-2">
            <x-input-field.field label="Số điện thoại" type="text" name="tel" id="tel" placeholder="078 **** ****"
                required="*" autocomplete="on" />
        </div>

        <div class="mt-2">
            <x-form-element.text-area label="Địa chỉ" name="address" id="address" required="*" class="h-[70px]" autocomplete="on"/>
        </div>

        <div class="mt-2">
            <x-input-field.field label="Email" type="text" name="email" id="email" placeholder="yourmail@gmail.com"
                required="*" autocomplete="on" />
        </div>
        
        <!-- Password -->
        <div class="mt-2">
            <x-input-field.field label="Mật khẩu" type="password" name="password" id="password" required="*"
                autocomplete="new-password" />
        </div>

        <div class="mt-2">
            <x-input-field.field label="Xác nhận mật khẩu" type="password" name="password_confirmation" id="password_confirmation" required="*"
                autocomplete="new-password" />
        </div>

        <div class="flex items-center justify-end mt-2">
            <x-button.primary-button>
                Đăng ký
            </x-button.primary-button>
        </div>

        <div class="flex justify-center my-3">
            <a href="{{ url('dang-nhap-thanh-vien') }}" class="flex items-center gap-1 font-normal text-sm text-gray-500 hover:text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"        class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
                <span>Quay về đăng nhập</span>
            </a>
        </div>

    </form>
</x-form-layout>
