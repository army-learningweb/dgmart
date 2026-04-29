<x-client-layout>

    <div class="flex gap-4 relative py-3">
        {{-- max_sale_off --}}
        <div class="w-[30%] bg-white rounded-3xl shadow-md h-[320px] overflow-hidden relative">
            @include('client.home.partials.max-sale-off')
        </div>

        {{-- slider banner --}}
        <div class="flex-1 rounded-3xl shadow-md h-[320px] overflow-hidden relative">
            @include('client.home.partials.slider-banner')
        </div>
    </div>

    {{-- new product --}}
    <div class="mt-5 py-3">
        <x-slider-product.list :products="$new_products" target="new-product" title="Mới tại cửa hàng" tag="Mới"
            tag_variant="bg-blue-600/10 text-blue-600" />
    </div>

    {{-- sale product --}}
    <div class="mt-1 py-3">
        <x-slider-product.list :products="$sale_products" target="sale-product" title="Ưu đãi & giảm giá" />
    </div>

    {{-- why us --}}
    <div class="mt-1 py-3">
        @include('client.home.partials.why-us')
    </div>

    {{-- accessories --}}
    <div class="mt-1 py-3">
        <x-slider-product.list :products="$accesories_product" target="accesories-product" title="Phụ kiện hoàn hảo" />
    </div>

    {{-- support --}}
    <div class="mt-1 py-3">
        @include('client.home.partials.support')
    </div>

    {{-- post --}}
    <div class="mt-1 py-3">
        @include('client.home.partials.posts')
    </div>

</x-client-layout>
