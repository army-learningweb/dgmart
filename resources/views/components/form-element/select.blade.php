@props([
    'name' => '',
    'id' => '',
    'module' => '',
    'class' => '',
    'type' => '',
    'label' => '',
    'form' => '',
])

@if ($label)
    <label for="{{ $id }}" class="block"> {{ $label }} <span class="text-red-600">*</span></label>
@endif

<select name="{{ $name }}" id="{{ $id }}"
    {{ $attributes->merge(['class' => "$class rounded-md py-[7px] md:py-[5px] text-sm border-gray-200 w-full md:w-auto"]) }}
    data-module="{{ $module }}" data-type="{{ $type }}" form="{{ $form != '' ? $form : '' }}">
    {{ $slot }}
</select>
<x-input-field.error_php name="{{$name}}" />
