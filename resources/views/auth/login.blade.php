<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-field type="text" name="email" id="email" label="Email" placeholder="yourmail@gmail.com"/>
        </div>

        <!-- Password -->
        <div class="mt-2">
            <x-input-field type="password" name="password" id="password" label="Password"/>
        </div>
        
        <!-- Remember Me -->
        <div class="flex items-center justify-between mt-4">
            <label for="remember_me">
                <input id="remember_me" type="checkbox" class="border-gray-300 rounded dark:bg-[#1e1f20] text-teal-600 shadow-sm focus:ring-0 dark:border-0 focus:outline-0 " name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Ghi nhớ đăng nhập</span>
            </label>
             @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    Quên mật khẩu ?
                </a>
            @endif
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="w-full">
                Đăng nhập
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
