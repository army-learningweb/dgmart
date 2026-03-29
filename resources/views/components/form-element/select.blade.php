@props([
    'name' => '',
    'id' => '',
    'module' => '',
    'class' => '',
    'type' => '',
    'label' => ''
])
@if ($label)
    <label for="{{ $id }}"> {{ $label }} <span class="text-red-600">*</span></label>
@endif
<select name="{{ $name }}" id="{{ $id }}"
    {{ $attributes->merge(['class' => "$class rounded-md py-[7px] md:py-[3px] text-sm shadow-sm border-gray-500/30 focus:border-emerald-500 focus:ring-emerald-500 w-full md:w-auto"]) }}
    data-module="{{ $module }}" data-type="{{ $type }}">
    {{ $slot }}
</select>
<x-input-field.error_php :name="$name" />
