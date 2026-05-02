@php
    $count_segments = count(request()->segments());
@endphp

@if (request()->segment(1))
    @foreach ($menus as $item)
        @if ($item->slug == request()->segment(1))
            <a href="{{ $item->slug =='cua-hang' ? '/' : url($item->slug) }}" class="hover:text-blue-600 text-gray-500">{{ $item->name }}</a>
        @endif
    @endforeach

    @if (request()->segment(2))
        @php
            $slug = request()->segment(1) . '/' . request()->segment(2)
        @endphp
        @foreach ($categories as $item)
            @if ($item->slug == $slug)
                / 
                <a href="{{ url($item->slug) }}" class="hover:text-blue-600 {{ $item->slug == $slug ? 'breadcrum-active text-gray-900' : 'text-gray-500' }}">
                    {{ $item->name }}
                </a>
            @endif
        @endforeach
    @endif
@endif
