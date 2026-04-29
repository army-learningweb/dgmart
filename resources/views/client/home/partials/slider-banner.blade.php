<div class="slider-banner flex transition-all duration-300">
    @foreach ($banners as $banner)
        <div class="slider-item relative w-full shrink-0">
            <img src="{{ asset($banner->media->where('type', 'slider')->where('object_id', $banner->id)->value('url')) }}"
                alt="" class="h-full w-full object-cover">
            <div class="absolute z-50 top-10 left-7 font-bold text-4xl italic text-gray-700">
                {{ $banner->title }}
            </div>
            <div class="absolute z-50 top-24 left-7 w-[350px] text-gray-500">{{ $banner->desc }}</div>
            <x-button.button-redirect link="" name="Tìm hiểu thêm" class="absolute top-48 left-7"/>
        </div>
    @endforeach
</div>

{{-- <div class = 'inline-flex gap-3 absolute bottom-5 right-5'>
    <div class="btn-prev-banner shadow-md bg-white rounded-full p-[5px] hover:brightness-110 cursor-pointer group">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-6 group-hover:text-blue-600 select-none">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
        </svg>
    </div>
    <div class="btn-next-banner shadow-md bg-white rounded-full p-[5px] hover:brightness-110 cursor-pointer group">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6 group-hover:text-blue-600">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
    </div>
</div> --}}

