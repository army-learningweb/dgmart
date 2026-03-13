<div>
    
    <div
        class="filter-status flex items-center relative gap-3 border border-gray-500/80 shadow-md dark:bg-[#1e1f20] py-1 px-2 rounded-[4px] cursor-pointer w-[165px]">
        <div
            class="filter-text flex items-center justify-between gap-2 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100 w-full">
            <span>Lọc theo trạng thái</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
            </svg>
        </div>

        {{-- option --}}
        <ul
            class="filter-status-option pointer-events-none opacity-0 scale-0 transition-all duration-100 absolute left-0 top-9 border border-gray-500/80 dark:bg-[#1e1f20] w-full rounded-md shadow-md py-1 px-2">
            <li class="filter-status-item py-1 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100"
                data-status="active">
                Hoạt động
            </li>
            <li class="filter-status-item py-1 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100"
                data-status="unactive">
                Vô hiệu hóa
            </li>
        </ul>
    </div>

</div>
