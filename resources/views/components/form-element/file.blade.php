@props([
    'name' => '',
    'type' => '',
    'none_upload_icon' => '',
    'none_mimes_required' => '',
    'remove_size' => 'size-6',
    'main' => "0",
    'is_edit' => ''
])

<div class="relative">
    <label for="{{ $name }}"
        {{ $attributes->merge(['class' => 'relative border border-dashed rounded-md shadow-sm border-gray-500/50 flex flex-col justify-center items-center gap-2 cursor-pointer']) }}>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>
            
        <span class="text-blue-600 hover:underline">Upload</span>
        
        @if ($none_mimes_required != 'true')
            <span class="text-xs text-gray-500">Định dạng JPG,PNG,JPEG,WEBP</span>
        @endif
        
        {{-- img --}}

        @if ($is_edit == '')
            <img src="{{ session($name) ? session($name) : '' }} " alt=""
            class="{{ $name }}-img w-full h-full object-contain absolute {{ session($name) && $is_edit == '' ? '' : 'hidden' }}">
        @else
            <img src="{{ session("old-$name-img") ? session("old-$name-img") : '' }}" alt=""
            class="{{ $name }}-img w-full h-full object-contain absolute {{ session("old-$name-img") && $is_edit == 'true' ? '' : 'hidden' }}">
        @endif

    </label>
    
    {{-- remove img --}}
    <div class="remove-file absolute z-50 top-0 right-0 p-2 cursor-pointer {{ session($name) && $is_edit == '' ? '' : 'hidden' }}"
        data-name="{{ $name }}" data-type = {{ $type }}>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="{{ $remove_size }} text-red-500 hover:brightness-150">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
    </div>

    {{-- fake remove img --}}
    <div class="fake-remove-file absolute z-50 top-0 right-0 p-2 cursor-pointer {{ session("old-$name-img") && $is_edit == 'true' ? '' : 'hidden' }}"
        data-name="{{ $name }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="{{ $remove_size }} text-red-500 hover:brightness-150">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
    </div>

    {{-- value --}}
    <input type="file" id="{{ $name }}" name="file" class="upload-file hidden" data-type="{{ $type }}" data-main="{{ $main }}"
        data-name="{{ $name }}">
    <input type="hidden" name="{{ $name }}-id" value="{{ session("$name-id") ? session("$name-id") : '' }}">
    <input type="hidden" name="old-{{ $name }}-id" value="{{ session("old-$name-id") }}">
    <input type="hidden" name="destroy-session" value="{{ $name }}">


    <x-input-field.error_ajax :name="$name" />

    <x-input-field.error_php name="{{ $name }}-id" />
    <x-input-field.error_php name="old-{{ $name }}-id" />
</div>


