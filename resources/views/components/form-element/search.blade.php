@props([
    'placeholder' => '',
    'name' => '',
    'id' => '',
    'module' => '',
    'value' => ''
])

<div class="flex items-center border border-gray-200 bg-white rounded-md pl-2 w-full md:min-w-[250px]">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="size-4 text-gray-500">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
    </svg>
    <input type="search" placeholder="{{ $placeholder }}" name="{{ $name }}" id="{{ $id }}" value="{{ $value }}"
        data-module="{{ $module }}"
        {{ $attributes->merge(['class' => 'w-full py-[7px] md:py-[5px] rounded-md bg-transparent border-none text-sm focus:ring-0 focus:border-none']) }}>
</div>
