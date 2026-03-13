@props(['modal'])

<div>
    <button
        class="open-modal open-modal-{{ $modal }} py-1 bg-gradient-to-r from-teal-400 to-emerald-400 shadow-md text-gray-900 px-3 rounded-[4px] flex gap-1 hover:brightness-110" data-modal={{$modal}}>
        <span>
            {{ $slot }}
        </span>
        <span>Tạo mới</span>
    </button>
</div>
