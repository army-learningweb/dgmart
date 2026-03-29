@props([
    'name' => '',
    'type' => '',
])

<div>
    <div class="my-[6px]">Upload ảnh
        <span class="text-red-600">*</span>
        <span class="text-gray-500 text-xs">(JPG, JPEG, PNG, AVIF)</span>
    </div>

    <div
        {{ $attributes->merge(['class' => 'border border-gray-500/30 rounded-md overflow-hidden shadow-sm w-full h-[250px]']) }}>

        <label for="file" class="cursor-pointer borde h-full w-full flex justify-center items-center relative">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
            </svg>

            <img src="{{ session($name) ? session($name) : '' }}" alt="" class="{{ $name }} absolute w-full h-full object-cover {{ session($name) ? '' : 'hidden' }}">
        </label>

        <input type="file" name="{{ $name }}" id="file" class="hidden upload-file"
            data-type="{{ $type }}">
        <input type="hidden" name="{{ $name }}_id" value="{{ session("$name"."_id") ? session("$name"."_id") : ''}}">
    </div>

    <div class="remove-file remove_{{$name}} mt-1 cursor-pointer bg-red-600 hover:brightness-125 shadow-sm text-white py-[6px] rounded-md {{ session($name) ? '' : 'hidden' }}" data-id="{{ session("$name"."_id") ? session("$name"."_id") : ''}}" data-name="{{$name}}">
        <div class="flex gap-2 justify-center items-center select-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
        </svg>
        Thu hồi ảnh
        </div>
    </div>

    <x-input-field.error_ajax :name="$name" />
    <x-input-field.error_php :name="$name" />
</div>
