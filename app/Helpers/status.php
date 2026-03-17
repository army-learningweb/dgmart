<?php

function user_status($status)
{
    $arr_status = [
        'active' => ' <div
                        class="inline-flex items-center gap-1 rounded-md bg-green-400/10  px-2 py-1 text-xs font-medium dark:text-green-400 text-green-600">
                        <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </span>
                        <span>Hoạt động</span>
                    </div>',
                    
        'unactive' => ' <div
                        class="inline-flex items-center gap-1 rounded-md bg-red-400/10 px-2 py-1 text-xs font-medium dark:text-red-400 text-red-600">
                        <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </span>
                        <span>Vô hiệu hóa</span>
                    </div>'
    ];

    return $arr_status[$status];
}
