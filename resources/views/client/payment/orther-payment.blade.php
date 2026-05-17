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

        @if (session('order')['payment_method'] == 'momo')
            <div class="bg-gradient-to-r from-pink-500 to-pink-700 flex-1 rounded-2xl flex justify-center items-center">
                <div class="flex flex-col justify-center items-center gap-5">
                    <div class="font-semibold text-2xl text-white tracking-tight">Quét mã QR để thanh toán</div>
                    <div class="bg-white rounded-2xl overflow-hidden relative p-3">
                        <img src="{{ asset('images/qr_demo.png') }}" alt="" class="w-full h-[230px]">
                        <div
                            class="bg-gradient-to-t from-pink-500/50 to-white/5 h-50 absolute left-0 w-full h-10 animate_qr_scan">
                        </div>
                    </div>
                    <div class="text-white">
                        <p>Sử dụng <span class="font-bold">App</span> hoặc ứng dụng Camera hỗ trợ QR code để quét mã</p>
                    </div>
                </div>
            </div>
        @endif

        @if (session('order')['payment_method'] == 'banking' || session('order')['payment_method'] == 'zalo')
            <div class="bg-gradient-to-r from-cyan-500 to-teal-700 flex-1 rounded-2xl flex justify-center items-center">
                <div class="flex flex-col justify-center items-center gap-5">
                    <div class="font-semibold text-2xl text-white tracking-tight">Quét mã QR để thanh toán</div>
                    <div class="bg-white rounded-2xl overflow-hidden relative p-3">
                        <img src="{{ asset('images/qr_demo.png') }}" alt="" class="w-full h-[230px]">
                        <div
                            class="bg-gradient-to-t from-teal-500/50 to-white/5 h-50 absolute left-0 w-full h-5 animate_qr_scan">
                        </div>
                    </div>
                    <div class="text-white">
                        <p>Sử dụng <span class="font-bold">App</span> hoặc ứng dụng Camera hỗ trợ QR code để quét mã</p>
                    </div>
                </div>
            </div>
        @endif

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
