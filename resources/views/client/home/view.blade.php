<x-client-layout>

    <div class="animate_reveal">
        <h1
            class="text-6xl font-bold tracking-tight bg-gradient-to-r from-blue-600 to-blue-900 bg-clip-text text-transparent py-3 pl-5 md:pl-0">
            Cửa hàng</h1>
    </div>

    {{-- <div class="py-5">
        @include('client.home.partials.product-categories')
    </div> --}}

    {{-- new product --}}
    <div class="mt-5 py-3">
        <x-slider-product.list :products="$new_products" target="new-product" title="Mới nhất" tag="Mới"
            tag_variant="bg-blue-600/10 text-blue-600" />
    </div>

    {{-- sale product --}}
    <div class="mt-1 py-3">
        <x-slider-product.list :products="$sale_products" target="sale-product" title="Ưu đãi & giảm giá" />
    </div>

    {{-- why us --}}
    <div class="mt-1 py-3">
        <x-why-us/>
    </div>

    {{-- accessories --}}
    <div class="mt-1 py-3">
        <x-slider-product.list :products="$accesories_product" target="accesories-product" title="Phụ kiện hoàn hảo" />
    </div>

    {{-- support --}}
    <div class="mt-1 py-3">
        <x-support/>
    </div>

    {{-- post --}}
    <div class="mt-1 py-3">
        @include('client.home.partials.posts')
    </div>

</x-client-layout>
