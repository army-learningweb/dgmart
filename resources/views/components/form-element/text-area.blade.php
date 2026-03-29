@props([
    'label' => '',
    'name' => '',
    'id' => '',
    'required' => '',
    'value' => ''
])
<div>
    <x-input-field.label :id="$id" :label="$label" :required="$required"/>
    <textarea name="{{$name}}" id="{{$id}}" cols="30" rows="10" placeholder="Nội dung..."{{ $attributes->merge(['class' => 'dark:bg-[#1e1f20] w-full mt-1 h-[55px] rounded-md border-gray-300 shadow-sm text-sm focus:border-emerald-500 focus:ring-emerald-500']) }}>{{ old($name) }}</textarea>
    <x-input-field.error_php :name="$name" class="!mt-0"/>
    <x-input-field.error_ajax :name="$name" class="!mt-0" />
</div>