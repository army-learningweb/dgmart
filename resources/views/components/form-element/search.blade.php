@props([
    'route' => '',
    'placeholder' => '',
    'name' => '',
    'id' => '',
    'module' => ''
])

<div>
    <form action="{{ $route }}" method="get">
        <div class="flex items-center border border-gray-500/30 bg-white shadow-sm rounded-md pl-2 w-full md:w-[250px]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input type="search" placeholder="{{ $placeholder }}" name="{{ $name }}" id="{{ $id }}" data-module="{{ $module }}"
            {{ $attributes->merge(["class" => "w-full py-[7px] md:py-[3px] rounded-md bg-transparent border-none text-sm focus:ring-0 focus:border-none"]) }}>
        </div>
    </form>
</div>
