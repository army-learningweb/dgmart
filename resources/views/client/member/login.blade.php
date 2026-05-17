<x-form-layout>
    <form method="POST" action="{{ route('dang-nhap-thanh-vien.checkLogin') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-field.field label="Email" type="text" name="email" id="email" placeholder="yourmail@gmail.com"
                required="*" autocomplete="on" />
        </div>

        <div class="flex justify-end">
            <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none inline-block"
                href="">
                Quên mật khẩu ?
            </a>
        </div>

        <!-- Password -->
        <div class="">
            <x-input-field.field label="Mật khẩu" type="password" name="password" id="password" required="*"
                autocomplete="current-password" />
        </div>

        <div class="flex items-center justify-end mt-2">
            <x-button.primary-button>
                Đăng nhập
            </x-button.primary-button>
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between mt-3">
            <div class="text-sm flex gap-1">
                <span>Chưa có tài khoản ?</span>
                <a href="{{ url('dang-ky-thanh-vien') }}" class="text-sm text-blue-600 hover:underline">Đăng ký ngay</a>
            </div>
        </div>
    </form>
</x-form-layout>
