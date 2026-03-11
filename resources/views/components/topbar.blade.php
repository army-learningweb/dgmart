<div class="flex gap-3">
    
    {{-- icon --}}
    <div class="flex items-center gap-3">

        {{-- create --}}
        <div class="hidden md:block">
             <div class="flex items-center gap-1 text-gray-600 hover:text-gray-800 bg-gray-100 shadow-md dark:bg-[#1e1f20] px-3 py-1 rounded-md cursor-pointer dark:text-gray-400 dark:hover:text-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span>Tạo mới</span>
        </div>
        </div>
       

        {{-- swichtmode --}}
        <div>
            <x-button-switch-mode />
        </div>

        {{-- bell  --}}
        <div class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
        </div>
    </div>
    {{-- admin --}}
    <div>
        {{-- avatar --}}
        <div class="w-9 h-9 overflow-hidden rounded-full cursor-pointer">
            <img src="{{ asset('images/avatar.jpg') }}" alt="" class="w-full h-full object-cover">
        </div>
    </div>
</div>
