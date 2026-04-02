@props([
    'number',
    'statis_name'
])

<div class="shadow-md bg-white col-span-1 shrink-0 p-5 rounded-md">
    <div class="flex items-center gap-5">
        <div class="text-blue-600">
            {{ $slot }}
        </div>
        <div>
            <div class="text-2xl font-semibold">{{ $number }}</div>
            <div>{{ $statis_name }}</div>
        </div>
    </div>
</div>