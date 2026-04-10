<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-field.field label="Email" type="text" name="email" id="email" placeholder="yourmail@gmail.com" required="*" autocomplete="on"/>
        </div>

        <!-- Password -->
        <div class="mt-2">
            <x-input-field.field label="Mật khẩu" type="password" name="password" id="password" required="*" autocomplete="current-password"/>
        </div>
        
        <!-- Remember Me -->
        <div class="flex items-center justify-between mt-3">
            <label for="remember_me">
                <input id="remember_me" type="checkbox" class="border-gray-300 rounded shadow-sm focus:ring-0 focus:outline-0" name="remember">
                <span class="ms-1 text-sm text-gray-600">Ghi nhớ đăng nhập</span>
            </label>
             @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none inline-block" href="{{ route('password.request') }}">
                    Quên mật khẩu ?
                </a>
            @endif
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button.primary-button>
                Đăng nhập
            </x-button.primary-button>
        </div>
    </form>
</x-guest-layout>
