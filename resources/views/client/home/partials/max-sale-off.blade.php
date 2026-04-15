@if (isset($top_sale_product))
    <div class="absolute top-10 left-5 space-y-1">
        <div class="absolute z-40 top-1 left-1 italic text-gray-700 text-4xl font-bold min-w-[400px]">
            Giảm đến {{ $top_sale_product->sale_off }}%
        </div>
    </div>
    <div class="absolute z-40 top-24 left-7">
        <span class="text-gray-500">Cơ hội sở hữu {{ $top_sale_product->name }}</span>
        <span
            class="text-red-600/90 text-3xl font-bold inline-block mt-1">{{ num_format($top_sale_product->price_sale_off) }}</span>
    </div>
    <img src="{{ asset($top_sale_product->medias->where('is_main', 0)->where('type','product')->value('url')) }}" alt=""
        class="w-[85%] h-[85%] object-contain absolute z-30 top-32 left-36">
    <a href=""
        class="flex gap-2 items-center absolute top-48 left-7 text-white px-4 py-[7px] rounded-3xl shadow-sm bg-gradient-to-r from-blue-500 to-blue-700 hover:brightness-125">
        <span></span>Xem chi tiết
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>
        </span>
    </a>
@else
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum, ipsum. Illum, molestiae officia amet
        voluptatibus accusamus doloribus officiis repellendus fugit repudiandae, eligendi cum,
        exercitationem nisi sed dolorem. Illum, atque ut?Dolorem et veniam voluptatibus! Quis omnis incidunt
        quia ipsam quasi nihil consectetur cumque tempore nemo cupiditate culpa, ex dignissimos similique id
        vel modi ducimus totam. A esse adipisci repellat dolorum.
    </p>
@endif
