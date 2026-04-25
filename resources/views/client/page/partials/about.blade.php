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

{{-- story --}}
<div class="flex gap-5">
    <div class="flex-1">
        <h1
            class="text-5xl pb-2 font-bold bg-gradient-to-r from-blue-500 to-blue-800 bg-clip-text text-transparent tracking-tighter">
            Câu chuyện
        </h1>
    </div>
    <div class="w-[65%] py-2">
        <p class=" leading-7 text-[16px]">
            "Tại <span class="font-bold">Digimart</span>, chúng tôi không chỉ tạo ra sản phẩm, chúng tôi tạo ra giá
            trị. Khởi đầu từ một niềm
            đam mê nhỏ, chúng tôi luôn nỗ lực mỗi ngày để mang đến những giải pháp đột phá, giúp cuộc sống của bạn
            trở nên đơn giản và tốt đẹp hơn. Với chúng tôi, sự hài lòng của khách hàng không chỉ là mục tiêu, mà là
            kim chỉ nam cho mọi hành động. Hãy cùng chúng tôi viết tiếp hành trình đầy cảm hứng này!"
        </p>
    </div>
</div>

{{-- mission --}}
<div class="flex gap-5 py-14 relative">
    <div class="flex-1">
        {{-- <h1
            class="text-5xl pb-2 font-bold bg-gradient-to-r from-blue-500 to-blue-800 bg-clip-text text-transparent tracking-tighter">
            Sứ mệnh
        </h1> --}}
    </div>
    <div class="w-[65%]">
         <h1
            class="text-5xl pb-5 font-bold  bg-gradient-to-r from-gray-500 to-gray-800 bg-clip-text text-transparent tracking-tighter">
            Chúng tôi không chỉ bán thiết bị
        </h1>
         <h1 class="text-2xl py-5 text-[16px] leading-6">
            "Chúng tôi cung cấp giải pháp nâng tầm cuộc sống số của bạn. Digimart hướng tới mục tiêu trở thành hệ sinh
            thái công nghệ hàng đầu, nơi mọi khách hàng đều có thể tìm thấy sự hiện đại, tiện nghi và giá trị bền vững."
        </h1>
        <x-button.button-redirect link="{{ url('san-pham') }}" name="Ghé cửa hàng" class="w-fit" />
    </div>
    

</div>

{{-- number --}}
<div class="flex gap-5">
    <div class="flex-1">
        <h1
            class="text-5xl pb-2 font-bold bg-gradient-to-r from-blue-500 to-blue-800 bg-clip-text text-transparent tracking-tighter">
            Khách hàng đánh giá thế nào ?
        </h1>
        <div class="mt-10 text-[16px] leading-6">
            "Chúng tôi luôn trân trọng mọi ý kiến đóng góp từ phía khách hàng. Những lời khen là động lực, và những
            góp ý chân thành là cơ hội để chúng tôi hoàn thiện mình hơn mỗi ngày."
        </div>
    </div>
    <div class="w-[65%] py-2">
        <div>
            <div class="flex gap-2">
                <div class="bg-white p-5 shadow-md rounded-2xl w-[35%]">
                    <div class="flex gap-1">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-6 text-amber-500">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                    clip-rule="evenodd" />
                            </svg>
                        @endfor
                    </div>
                    <div class="mt-2">
                        “Sản phẩm đúng mô tả, đóng gói cẩn thận. Giao hàng nhanh hơn mình nghĩ.”
                    </div>
                    <div class="mt-2 font-semibold">
                        Nguyễn Minh Anh – Sinh viên
                    </div>
                </div>
                <div class="bg-white p-5 shadow-md rounded-2xl w-[35%]">
                    <div class="flex gap-1">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-6 text-amber-500">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                    clip-rule="evenodd" />
                            </svg>
                        @endfor
                    </div>
                    <div class="mt-2">
                        “Giá khá tốt so với thị trường, hỗ trợ khách hàng nhiệt tình.”
                    </div>
                    <div class="mt-2 font-semibold">
                        Trần Quốc Bảo – Nhân viên văn phòng
                    </div>
                </div>
            </div>
            <div class="flex gap-2 justify-end mt-2">
                <div class="bg-white p-5 shadow-md rounded-2xl w-[35%]">
                    <div class="flex gap-1">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-6 text-amber-500">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                    clip-rule="evenodd" />
                            </svg>
                        @endfor
                    </div>
                    <div class="mt-2">
                        “Mình đã mua 2 lần, chất lượng ổn định. Sẽ tiếp tục ủng hộ.”
                    </div>
                    <div class="mt-2 font-semibold">
                        Lê Hoàng Nam – Freelancer
                    </div>
                </div>
                <div class="bg-white p-5 shadow-md rounded-2xl w-[35%]">
                    <div class="flex gap-1">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-6 text-amber-500">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                    clip-rule="evenodd" />
                            </svg>
                        @endfor
                    </div>
                    <div class="mt-2">
                        “Website dễ dùng, đặt hàng nhanh. Trải nghiệm khá mượt.”
                    </div>
                    <div class="mt-2 font-semibold">
                        Phạm Thu Hà – Designer
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
