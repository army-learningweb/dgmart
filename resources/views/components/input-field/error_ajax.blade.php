@props(['name'])

<div {{ $attributes->merge(['class' => "{$name}_ajax_error error text-red-600 text-sm mt-1"]) }}></div>