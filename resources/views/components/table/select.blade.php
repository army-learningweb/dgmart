@props([
    'name' => '',
    'id' => '',
    'module' => '',
    'class' => '',
    'type' => '',
])

<select name="{{ $name }}" id="{{ $id }}"
    {{ $attributes->merge(['class' => "$class rounded-md py-1 text-xs shadow-sm border-gray-500/30 w-auto"]) }}
    data-module="{{ $module }}" data-type={{ $type }}>
    {{ $slot }}
</select>
