<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        Quên mật khẩu của bạn? Không sao. Chỉ cần cho chúng tôi biết địa chỉ email của bạn và chúng tôi sẽ gửi cho bạn một liên kết đặt lại mật khẩu để bạn có thể chọn mật khẩu mới.
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-field.field label="Email" type="text" name="email" id="email" placeholder="yourmail@gmail.com"/>
        </div>

        <div class="mt-2">
            <x-primary-button class="w-full">
                Gửi Email liên kết đặt lại mật khẩu 
            </x-primary-button>
        </div>

        <div class="mt-2 text-center">
            <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-50">Quay lại</a>
        </div>
    </form>
</x-guest-layout>
