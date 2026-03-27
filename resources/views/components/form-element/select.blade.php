@props([
    'name' => '',
    'id' => '',
    'module' => '',
    'class' => '',
    'type' => '',
])

<div>
    <select name="{{ $name }}" id="{{ $id }}"
        {{ $attributes->merge(['class' => "$class rounded-md py-[7px] md:py-[3px] text-sm shadow-md dark:text-gray-400 dark:bg-[#1e1f20] focus:border-emerald-500 focus:ring-emerald-500 w-full md:w-auto"]) }}
        data-module="{{ $module }}" data-type="{{ $type }}">
        {{ $slot }}
    </select>
</div>
