@props([
    'type',
    'name',
    'id',
    'placeholder',
    'value',
    'readonly'
])

<input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder }}" value="{{ $value }}" {{ $readonly }}
    {{ $attributes->merge([
        'class' =>
            'text-sm shadow-sm border-gray-300 rounded-md w-full mt-1',
    ]) }}>
