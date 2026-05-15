<x-client-layout>
    @php
        $page = session('client_sub_module_active');
    @endphp
    <div class="animate_reveal">
        @switch($page)
            @case('gioi-thieu')
                @include('client.page.partials.about')
            @break

            @case('lien-he-ho-tro')
                @include('client.page.partials.contact')
            @break

            @default
        @endswitch
    </div>

</x-client-layout>
