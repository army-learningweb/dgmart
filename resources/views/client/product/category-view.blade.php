<x-client-layout>
    <div class="flex items-start gap-4 mt-4">

        {{-- category --}}
        <div class="bg-white shadow-md p-5 rounded-2xl flex-1 sticky top-4">
            <h1 class="font-semibold text-[16px]">Phân loại sản phẩm</h1>
            <hr class="my-3">
            <ul>
                @foreach ($categories as $item)
                    <li class="group">
                        <a href="{{ url($item->slug)}}" class="group-hover:text-blue-600 py-[7px] flex justify-between">
                            <span>{{ $item->name }}</span>
                            <div class="group-hover:bg-blue-500 group-hover:border-0 border border-gray-500/50 h-[15px] w-[15px] rounded-full"></div>
                        </a> 
                    </li>
                @endforeach
            </ul>
            <hr class="my-3">
            <div class="mt-5">
                <img src="{{ asset('images/ads.webp') }}" alt="" class="rounded-2xl">
            </div>
        </div>

       {{-- product --}}
        <div class="rounded-xl w-[78%]">
            @include('client.product.partials.list',['data' => $products])
        </div>
    </div>

</x-client-layout>
