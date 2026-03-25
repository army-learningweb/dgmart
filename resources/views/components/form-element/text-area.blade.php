@props([
    'label' => '',
    'name' => '',
    'id' => '',
    'required' => '',
    'value' => ''
])
<div>
    <x-input-field.label :id="$id" :label="$label" :required="$required"/>
    <textarea name="{{$name}}" id="{{$id}}" cols="30" rows="10" placeholder="Nội dung..."{{ $attributes->merge(['class' => 'dark:bg-[#1e1f20] w-full mt-1 h-[100px] rounded-md dark:border-[#1e1f20] border-gray-300 shadow-sm text-sm focus:border-emerald-500 focus:ring-emerald-500']) }}>{{ old($name,$value) }}</textarea>
    <x-input-field.error_php :name="$name" />
</div>