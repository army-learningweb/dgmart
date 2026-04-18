<x-client-layout>
    @php
        $page = session('client_module_active')
    @endphp

    @switch($page)
        @case('gioi-thieu.html')
            @include('client.page.partials.about')
            @break
        @case('lien-he-ho-tro.html')
            @include('client.page.partials.contact')
            @break
        @default
    @endswitch
</x-client-layout>
