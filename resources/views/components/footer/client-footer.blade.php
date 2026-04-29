<hr class="my-3">
<ul class="flex py-4">
    <li class="flex-1">
        <x-application-logo class="text-3xl py-2" />
        <div class="mt-2">
            Digimart tự hào là đơn vị hàng đầu cung cấp các giải pháp thiết bị số hiện đại. Cam kết mang đến những sản
            phẩm công nghệ chính hãng, chất lượng cao.
        </div>
        <div class="mt-3 flex gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
            </svg>
            Địa chỉ: Quận 4 TP.HCM
        </div>
        <div class="mt-3 flex gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
            </svg>
            Email liên hệ: luuvy15899@gmail.com
        </div>
        <div class="mt-3 flex gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
            </svg>
            Hotline: 0782199911
        </div>
    </li>
    <li class="w-[20%] px-10 py-4">
        <div class="font-semibold text-gray-800 text-[16px]">Liên kết nhanh</div>
        <ul class="mt-4">
            @foreach ($menus as $item)
                <li><a href="{{ url($item->slug) }}" class="hover:text-blue-700 py-2 inline-block w-full">{{ $item->name }}</a></li>
            @endforeach
        </ul>
    </li>
    <li class="w-[20%]  px-10 py-4">
        <div class="font-semibold text-gray-800 text-[16px]">Theo dõi chúng tôi</div>
        <ul class="mt-4">
            <li>
                <a href="" class="hover:text-blue-700 py-[6px] inline-flex gap-3 items-center w-full">
                    <img src="{{ asset('/images/facebook.svg') }}" alt="" class="w-[25px] h-[25px]">
                    <div>Facebook</div>
                </a>
            </li>
            <li>
                <a href="" class="hover:text-blue-700 py-[6px] inline-flex gap-3 items-center w-full">
                    <img src="{{ asset('/images/youtube.svg') }}" alt="" class="w-[25px] h-[25px]">
                    <div>Youtube</div>
                </a>
            </li>
            <li>
                <a href="" class="hover:text-blue-700 py-[6px] inline-flex gap-3 items-center w-full">
                    <img src="{{ asset('/images/zalo.svg') }}" alt="" class="w-[25px] h-[25px]">
                    <div>Zalo</div>
                </a>
            </li>
            <li>
                <a href="" class="hover:text-blue-700 py-[6px] inline-flex gap-3 items-center w-full">
                    <img src="{{ asset('/images/instagram.svg') }}" alt="" class="w-[25px] h-[25px]">
                    <div>Instagram</div>
                </a>
            </li>
            <li>
                <a href="" class="hover:text-blue-700 py-[6px] inline-flex gap-3 items-center w-full">
                    <img src="{{ asset('/images/tiktok.svg') }}" alt="" class="w-[25px] h-[25px]">
                    <div>Tiktok</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="flex-1  px-10 py-4">
        <div class="font-semibold text-gray-800 text-[16px]">Tổng đài hỗ trợ miễn phí</div>
        <div class="mt-6">
            Mua hàng - bảo hành - 1234.5678 (8:00 - 22:00)
        </div>
        <div class="mt-2">
            Khiếu nại - 9101.1121 (8:00 - 22:00)
        </div>
        <div class="font-semibold text-gray-800 text-[16px] my-5">Phương thức thanh toán</div>
        <ul class="flex gap-2">
            <li><img src="{{ asset('images/applepay.png') }}" alt=""
                    class="w-[80px] h-[55px] rounded-lg shadow-md"></li>
            <li><img src="{{ asset('images/vietcombank.webp') }}" alt=""
                    class="w-[80px] h-[55px] rounded-lg shadow-md"></li>
            <li><img src="{{ asset('images/vietinbank.png') }}" alt=""
                    class="w-[80px] h-[55px] rounded-lg shadow-md object-cover"></li>
            <li><img src="{{ asset('images/momo.svg') }}" alt=""
                    class="w-[80px] h-[55px] rounded-lg shadow-md object-cover"></li>
        </ul>
    </li>
</ul>
<div class="text-center">
    © 2026 Digimart. All Copyright Reserve
</div>
