@props(['modal'])

<div>
    <button
        class="open-modal md:py-1 py-[7px] px-3 bg-gradient-to-r from-teal-300 to-emerald-300 shadow-sm text-gray-900 rounded-md flex gap-1 hover:brightness-110 w-full md:w-auto justify-center" data-modal={{$modal}}>
        <span>
            {{ $slot }}
        </span>
        <span>Tạo mới</span>
    </button>
</div>
