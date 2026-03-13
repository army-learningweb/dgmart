<x-app-layout>
    <div class="">
        <div class="max-w-7xl mx-auto pb-5">
            <div class="space-y-2">
                <div class="p-5 bg-white dark:border dark:border-gray-500/30 dark:bg-[#18181b] shadow-md dark:shadow rounded-md">
                    <div class="max-w-xl">
                        @include('admin.profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-5 bg-white dark:border dark:border-gray-500/30 dark:bg-[#18181b] shadow-md dark:shadow rounded-md">
                    <div class="max-w-xl">
                        @include('admin.profile.partials.update-password-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
