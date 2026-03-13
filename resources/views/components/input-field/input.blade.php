@props([
    'type',
    'name',
    'id',
    'placeholder',
    'value'
])

<input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder }}" value="{{ $value }}"
    {{ $attributes->merge([
        'class' =>
            'text-sm shadow-sm border-gray-300 rounded-md w-full mt-1 focus:ring-emerald-400 focus:border-emerald-400 dark:border-[#18181b] dark:bg-[#1e1f20]',
    ]) }}>
