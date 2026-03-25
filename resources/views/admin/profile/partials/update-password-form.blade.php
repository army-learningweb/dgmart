<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-3">
        @csrf
        @method('put')

            <div>
                <x-input-field.field label="Mật khẩu hiện tại" type="password" name="current_password" id="update_password_current_password"/>
                <x-form-element.input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1" />
            </div>
            
            <div>
                <x-input-field.field label="Mật khẩu mới" type="password" name="password" id="update_password_password"/>
                 <x-form-element.input-error :messages="$errors->updatePassword->get('password')" class="mt-1" />
            </div>

            <div>
                <x-input-field.field label="Xác nhận mật khẩu" type="password" name="password_confirmation" id="update_password_password_confirmation"/>
                <x-form-element.input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1" />
            </div>
    
        <div class="flex items-center gap-4">
            <x-button.primary-button class="md:w-auto">Cập nhật</x-button.primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-700"
                >Cập nhật mật khẩu thành công</p>
            @endif
        </div>
    </form>
</section>
