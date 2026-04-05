@props([
    'modal',
    'title',
    'route' => '',
    'button_create',
    'width' => '',
    'height' => '',
    'enctype' => '',
    'variant' => ''
])

<div class="modal-element modal-{{ $modal }} {{ $errors->any() && old('modal') == 'create' ? '' : 'pointer-events-none opacity-0 scale-0' }} bg-[#1a1a1a]/30 backdrop-brightness-50 backdrop-blur-sm fixed left-0 top-0 z-50 w-full min-h-screen flex justify-center items-start p-4 md:p-0">
    {{-- modal --}}
     <div class="modal-{{ $modal }}-is-open w-[90vw] md:max-w-[400px] {{ $width }} bg-white shadow-md overflow-y-auto scrollbar-thumb-rounded-full scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-transparent p-5 rounded-lg md:mt-10 mt-3">
        
        <div class="flex justify-between items-center text-lg">
            <div class="modal-{{ $modal }}-title">{{ $title }}</div>
            <div>
                <div class="cancel-modal cancel-modal-{{ $modal }} cursor-pointer"
                    data-modal="{{ $modal }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 select-none text-gray-500 hover:text-gray-800">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
        </div>

        <form action="{{ $route }}" method="post" enctype="{{ $enctype }}">
            @csrf
            <div
                class="scrollbar-thumb-rounded-full scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-transparent max-h-[450px] {{ $variant }}">
                {{ $slot }}
            </div>
            <div class="mt-2 flex flex-col md:flex-row items-center justify-end gap-2">
                <x-modal-dial.button-cancel modal="{{ $modal }}" />
                <x-button.primary-button class="py-[5px] md:w-auto">{{ $button_create }}</x-button.primary-button>
            </div>
        </form>
    </div>
</div>
