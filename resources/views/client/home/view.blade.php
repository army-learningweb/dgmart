<x-client-layout>

    <div class="flex gap-4 py-4 relative">
        {{-- max_sale_off --}}
        <div class="w-[30%] bg-white rounded-3xl shadow-md h-[320px] overflow-hidden relative">
            @include('client.home.partials.max-sale-off')
        </div>

        {{-- slider banner --}}
        <div class="flex-1 rounded-3xl shadow-md h-[320px] overflow-hidden">
            @include('client.home.partials.slider-banner')
        </div>
    </div>

    {{-- category --}}
    <div>
        @include('client.home.partials.category')
    </div>

    {{-- new product --}}
    <div class="mt-3 py-3">
        <x-slider-product.list :products="$new_products" target="new-product" title="Mới tại cửa hàng" tag="Mới"
            tag_variant="bg-blue-600/10 text-blue-600" />
    </div>

    {{-- sale product --}}
    <div class="mt-3 py-3">
        <x-slider-product.list :products="$sale_products" target="sale-product" title="Ưu đãi & giảm giá"/>
    </div>

    {{-- why us --}}
    <div class="mt-3 py-3">
        @include('client.home.partials.why-us')
    </div>

    {{-- accessories --}}
    <div class="mt-3 py-3">
        <x-slider-product.list :products="$accesories_product" target="accesories-product" title="Phụ kiện hoàn hảo"/>
    </div>

</x-client-layout>
