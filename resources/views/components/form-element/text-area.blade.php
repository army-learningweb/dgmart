@props([
    'label' => '',
    'name' => '',
    'id' => '',
    'required' => '',
    'value' => '',
])

<x-input-field.label :id="$id" :label="$label" :required="$required" />
<textarea name="{{ $name }}" id="{{ $id }}" cols="30" rows="10" placeholder="Nội dung" {{ $attributes->merge(['class' => 'w-full mt-1 h-[100px] rounded-md border-gray-300 shadow-sm text-sm']) }}>{{ old($name) }}</textarea>
<x-input-field.error_php :name="$name" class="!mt-0" />
<x-input-field.error_ajax :name="$name" class="!mt-0" />
