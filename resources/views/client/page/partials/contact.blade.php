<div class="">
    <div class="flex gap-2 items-center py-3">
        <x-client-breadcrum/>
    </div>
    <div class="py-5 flex items-center gap-5">
        <div class="flex-1">
            <h1
                class="text-5xl pb-2 font-bold bg-gradient-to-r from-blue-500 to-blue-800 bg-clip-text text-transparent tracking-tighter">
                Hỗ trợ & liên hệ
            </h1>
            <h1
                class="text-3xl font-bold bg-gradient-to-r from-gray-600 to-gray-800 bg-clip-text text-transparent py-1 mt-2">
                Bộ phận chăm sóc khách hàng
            </h1>
            <p class="md:w-[70%] leading-6 mt-3">"Chúng tôi luôn luôn ở đây, để tiếp nhận phản hồi và hỗ trợ cho
                bạn, thắc mắc của bạn sẽ được giải đáp, Để lại thông tin bên dưới, bộ phận CSKH sẽ liên hệ với bạn trong
                24h tới"
            </p>
        </div>
        {{-- <div class="w-[50%]">
            <img src="{{ asset('images/map.png') }}" alt="" class="w-full h-full object-cover">
        </div> --}}
    </div>
    <div class=" flex items-start gap-4">
        <div class="w-[45%] bg-white shadow-md p-5 rounded-3xl">

            <form action="" method="post">
                <div class="mt-2">
                    <x-input-field.field label="Tên" type="text" name="name" id="name" required="*"
                        autocomplete="on" />
                </div>
                <div class="mt-2">
                    <x-input-field.field label="Số điện thoại" type="number" name="tel" id="tel"
                        required="*" autocomplete="on" />
                </div>
                <div class="mt-2">
                    <x-input-field.field label="Email" type="text" name="email" id="email"
                        placeholder="yourmail@gmail.com" required="*" autocomplete="on" />
                </div>
                <div class="mt-2">
                    <x-form-element.text-area label="Phản hồi của bạn" name="comment" id="comment" required="*"
                        class="h-[96px]" />
                </div>
                <div class="mt-2">
                    <x-button.primary-button>
                        Gửi phản hồi
                    </x-button.primary-button>
                </div>
            </form>

        </div>
        <div class="flex-1 bg-white shadow-md p-5 rounded-3xl">
            <div class="">
                <div class="flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 text-blue-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                    </svg>
                    +84 782199911
                </div>
            </div>
            <div class="mt-3">
                <div class="flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 text-blue-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    8:00 - 17:00 (Từ thứ 2 đến thứ 7 hằng tuần)
                </div>
            </div>
            <div class="mt-3">
                <div class="flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 text-blue-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                    luuvy15899@gmail.com
                </div>
            </div>
            <div class="mt-3 relative">
                <img src="{{ asset('images/map.png') }}" alt=""
                    class="rounded-2xl w-full h-[288px] object-cover">
                <div class="absolute bottom-5 left-5 bg-white shadow-sm p-4 rounded-lg space-y-3">
                    <h2 class="font-semibold">Văn phòng làm việc</h2>
                    <div class="flex gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5 text-blue-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                        <span>Q4 TP.HCM</span>
                    </div>
                    <div class="">
                        <a href="https://www.google.com/maps/search/Nguy%E1%BB%85n+Kho%C3%A1i+P2+Q4/@10.7538845,106.6932967,17z/data=!3m1!4b1?entry=ttu&g_ep=EgoyMDI2MDQxNC4wIKXMDSoASAFQAw%3D%3D"
                            target="blank"
                            class="flex gap-2 items-center border p-2 rounded-md w-fit hover:bg-blue-600 hover:text-white">
                            <span>Đường đi</span>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
