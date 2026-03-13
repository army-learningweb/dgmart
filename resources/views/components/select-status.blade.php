@props([
    'status' 
])

<div>

    <div
        class="select-status flex items-center relative gap-3 border border-gray-500/80 shadow-md dark:bg-[#1a1a1a] py-[2px] px-2 rounded-[4px] cursor-pointer w-[130px]">
        <div
            class="select-text flex items-center justify-between gap-2 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100 w-full">
            <span>{{ $status }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        </div>

        {{-- option --}}
        <ul
            class="select-status-option pointer-events-none opacity-0 scale-0 transition-all duration-100 absolute left-0 top-8 border border-gray-500/80 dark:bg-[#1a1a1a] w-full rounded-md shadow-md py-1 px-2">
            <li class="select-status-item py-1 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100"
                data-status="active">
                Hoạt động
            </li>
            <li class="select-status-item py-1 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100"
                data-status="unactive">
                Vô hiệu hóa
            </li>
        </ul>
    </div>

</div>
