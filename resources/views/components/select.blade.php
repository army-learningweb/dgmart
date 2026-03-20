@props([
    'name' => '',
    'id' => '',
    'module' => '',
    'class' => '',
])

<div>
    <select name="{{ $name }}" id="{{ $id }}"
        {{ $attributes->merge(['class' => "$class rounded-md text-sm shadow-md dark:text-gray-400 dark:bg-[#1e1f20] focus:border-emerald-500 focus:ring-emerald-500 w-full md:w-auto"]) }}
        data-module="{{ $module }}">
        {{ $slot }}
    </select>
</div>
