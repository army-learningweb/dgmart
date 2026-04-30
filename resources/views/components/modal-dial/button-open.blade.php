@props(['modal'])


<button
    class="open-modal md:py-[5px] py-[7px] px-3 bg-gradient-to-r from-blue-500 to-blue-700 shadow-sm text-white rounded-md w-auto flex gap-1 hover:brightness-110 justify-between"
    data-modal={{ $modal }}>
    <span>
        {{ $slot }}
    </span>
    <span>Tạo mới</span>
</button>
