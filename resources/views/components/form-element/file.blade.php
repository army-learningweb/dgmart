@props([
    'name' => '',
    'type' => ''
])   
    <div class="mt-8 relative">
        <label for="file"
            class="w-full h-[280px] relative border border-dashed rounded-md border-gray-500/50 flex flex-col justify-center items-center gap-2 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>

            <span class="text-blue-600 hover:underline">Upload File</span>
            <span class="text-xs text-gray-500">Định dạng JPG,PNG,JPEG</span>

            {{-- img --}}
            <img src="{{ session($name) ? session($name) : '' }}" alt="" class="{{ $name }}-img w-full h-full object-contain absolute {{ session($name) ? '' : 'hidden' }}">
        </label>

        {{-- remove img --}}
        <div class="remove-file absolute z-50 top-0 right-0 p-2 cursor-pointer {{ session($name) ? '' : 'hidden'}}" data-name="{{ $name }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-500 hover:brightness-150">
                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </div>

        <input type="file" id="file" name="file" class="upload-file hidden" data-type="{{ $type }}" data-name="{{ $name }}">
        <input type="hidden" name="{{ $name }}-id" value="{{ session("$name-id") ?  session("$name-id") : ''}}">
        <input type="hidden" name="destroy-session" value="{{ $name }}">
    </div>

    {{-- <x-input-field.error_ajax :name="$name" /> --}}
    <x-input-field.error_php name="{{$name}}-id" />

