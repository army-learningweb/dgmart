@props([
    'modal',
    'title',
    'route' => '',
    'button_edit'
])

<div
    class="modal-{{ $modal }} {{ $errors->any() && old('modal') == 'edit' ? '' : 'pointer-events-none opacity-0 scale-0' }}bg-[#1a1a1a]/30 backdrop-brightness-50 backdrop-blur-sm absolute left-0 top-0 z-50 w-full h-screen flex justify-center items-start">

    {{-- modal --}}
    <div class="modal-{{ $modal }}-is-open dark:bg-[#151517] bg-white shadow-md min-w-[400px] p-5 rounded-lg mt-20">

        {{-- title --}}
        <div class="flex justify-between text-lg">

            <div class="modal-{{ $modal }}-title">{{ $title }}</div>

            <div>
                <div class="cancel-modal cancel-modal-{{ $modal }} cursor-pointer dark:text-gray-400 dark:hover:text-gray-100" 
                data-modal="{{ $modal }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 select-none">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>

        </div>

        {{-- form --}}
        <div>

            <form action="{{ $route }}" method="post">
                @csrf

                {{$slot}}

                <div class="mt-3 flex items-center justify-end gap-2">
                    <x-modal-dial.button-cancel modal="{{ $modal }}" />
                    <x-button.primary-button class="py-[5px] md:w-auto">{{ $button_edit }}</x-button.primary-button>
                </div>
            </form>
        </div>
    </div>
</div>
