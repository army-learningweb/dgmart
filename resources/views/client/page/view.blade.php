<x-client-layout>
    @php
        $page = session('client_module_active')
    @endphp

    @switch($page)
        @case('gioi-thieu.html')
            @include('client.page.partials.about')
            @break
        @case('ho-tro-lien-he.html')
            @include('client.page.partials.contact')
            @break
        @default
    @endswitch
</x-client-layout>
