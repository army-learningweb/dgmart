<x-client-layout>

    {{-- introduce --}}
    <div class="py-14 flex gap-5">
        <div class="flex-1">
            <x-application-logo class="text-8xl py-5" />
            <h1
                class="text-8xl py-5 font-bold bg-gradient-to-r from-gray-500 to-gray-800 bg-clip-text text-transparent tracking-tighter">
                Chất lượng thật, giá trị bền lâu
            </h1>
        </div>
        <div class="w-[45%]">
            <img src="{{ asset('images/about.png') }}" alt="" class="w-full h-full object-cover">
        </div>
    </div>

    <div class="flex gap-5">
        <div class="flex-1">
            <h1
                class="text-5xl pb-2 font-bold bg-gradient-to-r from-blue-500 to-blue-800 bg-clip-text text-transparent tracking-tighter">
                Câu chuyện của chúng tôi
            </h1>
        </div>
        <div class="w-[65%] py-2">
            <p class="leading-6">
                Tại <span class="font-bold">Digimart</span>, chúng tôi không chỉ tạo ra sản phẩm, chúng tôi tạo ra giá trị. Khởi đầu từ một niềm
                đam mê nhỏ, chúng tôi luôn nỗ lực mỗi ngày để mang đến những giải pháp đột phá, giúp cuộc sống của bạn
                trở nên đơn giản và tốt đẹp hơn. Với chúng tôi, sự hài lòng của khách hàng không chỉ là mục tiêu, mà là
                kim chỉ nam cho mọi hành động. Hãy cùng chúng tôi viết tiếp hành trình đầy cảm hứng này!
            </p>
            <div class="inline-block mt-3">
                 <x-button.button-redirect link="" name="Ghé cửa hàng"/>
            </div>
           
        </div>
    </div>

</x-client-layout>
