@props(['id', 'name'])

<textarea id="{{ $id }}" name="{{ $name }}" placeholder="Nội dung..." class="focus:ring-0 focus:border-0">{{ $slot }}</textarea>
