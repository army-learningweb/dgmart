<x-client-layout>

    <div class="mx-auto flex gap-5">
        <div class="flex flex-col gap-2">
            <div class="bg-white p-5 rounded-xl border border-gray-200">
                <p class="font-semibold text-lg tracking-tight">Thông tin đơn hàng</p>
                <hr class="my-2">
                <div class="flex flex-col gap-1">
                    <span class="text-gray-500">Mã đơn</span>
                    <span>{{ session('order')['code'] }}</span>
                </div>
                <hr class="my-2">
                <div class="flex flex-col gap-1">
                    <span class="text-gray-500">Nhà cung cấp</span>
                    <span>{{ session('order')['payment_method'] }}</span>
                </div>
                <hr class="my-2">
                <div class="flex flex-col gap-1">
                    <span class="text-gray-500">Nội dung chuyển tiền</span>
                    <span>Thanh toán đơn hàng {{ session('order')['code'] }}</span>
                </div>
                <hr class="my-2">
                <div class="flex flex-col gap-1">
                    <span class="text-gray-500">Số tiền</span>
                    <span class="font-semibold text-2xl">{{ num_format(session('order')['price']) }}</span>
                </div>
            </div>
            <a href="https://mail.google.com" target="blank"
                class="text-xs font-semibold py-1 px-3 bg-white text-center rounded-md flex items-center justify-center border border-1 hover:shadow-sm transition-all duration-150 w-[400px]">
                <span><img src="{{ asset('images/gmail.jpg') }}" alt="gmail" width="40px"></span>
                <span>Chúng tôi đã gửi đơn xác nhận đến Mail của bạn</span>
            </a>

            <a href="/"
                class="w-[400px] bg-gradient-to-r from-blue-600 to-blue-800 py-2 rounded-md shadow-sm text-white text-center hover:brightness-110">Tiếp
                tục mua sắm</a>
        </div>

        <div class="bg-white border border-gray-200 flex-1 rounded-2xl">
            <div class="flex flex-col items-center justify-center mt-10">
<div class="w-full mx-auto">
                <svg width="100%" height="auto" viewBox="0 0 600 150" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <path d="M140 70 C140 60, 145 55, 153 55" stroke="#16A34A" stroke-width="2" stroke-linecap="round"
                        fill="none" />

                    <circle cx="165" cy="85" r="2.5" fill="#16A34A" />

                    <rect x="150" y="105" width="6" height="6" fill="#F97316" transform="rotate(45 153 108)" />

                    <rect x="230" y="35" width="8" height="8" fill="#16A34A" transform="rotate(15 234 39)" />

                    <path d="M218 80 C215 90, 218 100, 222 105" stroke="#EF4444" stroke-width="2" stroke-linecap="round"
                        fill="none" />

                    <circle cx="232" cy="118" r="1.5" fill="#16A34A" />

                    <g transform="translate(265, 45)">
                        <circle cx="35" cy="35" r="35" fill="#16A34A" />

                        <path d="M23 35 l8 8 l16 -16" stroke="white" stroke-width="4.5" stroke-linecap="round"
                            stroke-linejoin="round" fill="none" />
                    </g>

                    <rect x="350" y="42" width="7" height="7" fill="#16A34A"
                        transform="rotate(30 353.5 45.5)" />

                    <rect x="395" y="47" width="7" height="7" fill="#16A34A"
                        transform="rotate(15 398.5 50.5)" />

                    <path d="M358 118 C368 113, 375 95, 362 82" stroke="#EC4899" stroke-width="2" stroke-linecap="round"
                        fill="none" />

                    <path d="M398 90 C405 85, 415 88, 420 95" stroke="#EAB308" stroke-width="2" stroke-linecap="round"
                        fill="none" />

                    <rect x="420" y="110" width="6" height="6" fill="#16A34A" transform="rotate(45 423 113)" />
                </svg>
            </div>

            <div class="flex justify-center text-3xl text-green-700 font-bold">Đặt hàng thành công !</div>
            </div>
            
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <script>
        confetti({
            particleCount: 100,
            spread: 70,
            origin: {
                y: 0.6
            }
        });
    </script>
</x-client-layout>
