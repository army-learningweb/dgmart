@props([
    'target' => '',
    'size' => ''
])

<div {{ $attributes->merge(['class' => 'inline-flex gap-3']) }}>
    <div class="btn-prev shadow-md bg-white rounded-full p-[5px] hover:brightness-110 cursor-pointer group"
        data-target={{ $target }}>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
            class="{{ $size ? "size-".$size : 'size-6'}} group-hover:text-blue-600 select-none">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
        </svg>
    </div>
    <div class="btn-next shadow-md bg-white rounded-full p-[5px] hover:brightness-110 cursor-pointer group"
        data-target={{ $target }}>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
            stroke="currentColor" class="{{ $size ? "size-".$size : 'size-6'}} group-hover:text-blue-600">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
    </div>
</div>
