@props([
    'categories',
    'name'
])

@foreach ($categories as $item)
    <option value="{{ $item->id }}" {{ old($name) == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
@endforeach
