@props(['id','name'])

<div class="">
    <textarea id="{{ $id }}" name="{{ $name }}" placeholder="Nội dung..." class="focus:ring-0 focus:border-0">{{ old($name) }}</textarea>
</div>