@props([
    'name' => '',
    'id' => '',
    'module' => '',
    'class' => '',
    'type' => '',
])

<select name="{{ $name }}" id="{{ $id }}"
    {{ $attributes->merge(['class' => "$class rounded-md py-[4px] text-xs border-gray-200 w-auto"]) }}
    data-module="{{ $module }}" data-type={{ $type }}>
    {{ $slot }}
</select>
