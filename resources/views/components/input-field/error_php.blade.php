@props(['name'])

@error($name)
    <div class="{{ $name }}_php_error error text-red-600 dark:text-red-400 mt-1 text-sm">
        {{ $message }}
    </div>
@enderror
