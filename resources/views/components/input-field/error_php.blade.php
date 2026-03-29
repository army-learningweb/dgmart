@props(['name'])

@error($name)
    <div {{ $attributes->merge(['class' => "{$name}_php_error error text-red-600 mt-1 text-sm"]) }}>{{ $message }}</div>
@enderror
