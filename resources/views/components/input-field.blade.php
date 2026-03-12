@props([
    'type',
    'name',
    'id',
    'label',
    'placeholder' => ''
])

<div>
    <label for="{{ $id }}" class="block text-sm">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder }}" {{ $attributes->merge([
        'class' => 'text-sm shadow-sm border-gray-300 rounded-md w-full mt-1 focus:ring-emerald-400 focus:border-emerald-400 dark:border-[#18181b] dark:bg-[#1e1f20]'
    ]) }}>
    <div class="{{ $name }}_ajax_error text-red-600 text-sm mt-1"></div>
    @error($name)
        <div class="{{ $name }}_php_error text-red-600 mt-1 text-sm">
            {{ $message }}
        </div>
    @enderror
</div>