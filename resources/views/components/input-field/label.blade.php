@props([
    'id',
    'label',
    'required',
])

<label for="{{ $id }}" class="block text-sm">
    <span>{{ $label }}</span>
    @if ( $required == "*" )
        <span class="text-red-600">{{ $required }}</span>
    @else
        <span class="text-gray-500 text-xs">(Không bắt buộc)</span>
    @endif
</label>