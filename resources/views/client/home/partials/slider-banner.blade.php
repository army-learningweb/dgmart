<div class="slider-banner flex transition-all duration-300">
    @foreach ($banners as $banner)
        <div class="slider-item relative w-full shrink-0">
            <img src="{{ asset($banner->media->where('type', 'slider')->where('object_id', $banner->id)->value('url')) }}"
                alt="" class="h-full w-full object-cover">
            <div class="absolute z-50 top-10 left-10 font-bold text-4xl italic text-gray-700">
                {{ $banner->title }}
            </div>
            <div class="absolute z-50 top-24 left-10 w-[350px] text-gray-500">{{ $banner->desc }}</div>
            <a href="{{ $banner->redirect }}"
                class="flex gap-2 items-center absolute top-48 left-10 text-white px-4 py-[7px] rounded-3xl shadow-sm bg-gradient-to-r from-blue-500 to-blue-700 hover:brightness-125">
                <span></span>Xem thêm
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </span>
            </a>
        </div>
    @endforeach
</div>
{{-- <x-button.button-slider target="slider-banner" class="absolute bottom-10 right-7" /> --}}
