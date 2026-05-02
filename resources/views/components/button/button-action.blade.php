@props(['form' => ''])
<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'flex justify-center items-center gap-1 md:py-[5px] text-gray-900 bg-gradient-to-r from-violet-600 to-violet-900 hover:brightness-110 rounded-md text-sm px-3 py-[7px] text-white']) }}
    form="{{ $form != '' ? $form : '' }}">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="size-5">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
    </svg>
    
    <div class="spinner-loading hidden">
        <div class="flex gap-2 items-center">
            <svg class="w-5 h-5 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
        </div>
    </div>

    <span>Hành động</span>
</button>
