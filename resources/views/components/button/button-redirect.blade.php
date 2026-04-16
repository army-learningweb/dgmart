@props([
    'name' => '',
    'link' => ''
])

<a href="{{ $link }}"
    {{ $attributes->merge(['class' => 'flex gap-2 items-center text-white px-4 py-[7px] rounded-3xl shadow-sm bg-gradient-to-r from-blue-500 to-blue-800 hover:brightness-125']) }}>
    <span>{{ $name }}</span>
    <span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
    </span>
</a>
