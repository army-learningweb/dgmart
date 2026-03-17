@props(['modal'])

<div>
    <button
        class="open-modal py-1 bg-gradient-to-r from-teal-400 to-emerald-400 shadow-md text-gray-900 px-3 rounded-md flex gap-1 hover:brightness-110 w-full md:w-auto justify-center" data-modal={{$modal}}>
        <span>
            {{ $slot }}
        </span>
        <span>Tạo mới</span>
    </button>
</div>
