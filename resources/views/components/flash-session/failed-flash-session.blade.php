@if (session('status_failed'))
    <div
        class="animate_flash_session fixed bottom-0 right-9 opacity-0 z-50 pointer-events-none bg-gradient-to-r from-red-500 to-red-700 text-white p-4 rounded-md shadow-md flex gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-5">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <div>{{ session('status_failed') }}</div>
    </div>
@endif
