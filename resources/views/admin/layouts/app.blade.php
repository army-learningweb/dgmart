<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- MCE config -->
    <x-head.tinymce-config id="post-content"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="overflow-x-hidden overflow-y-scroll font-sans antialiased bg-[#fafafa] text-sm md:max-w-[1440px] mx-auto px-3 md:px-0">
    
    {{-- modal --}}
    
    {{-- Layout --}}
    <div class="min-h-screen">
        <!-- Header -->
        <header>
            <div class="w-full pt-4 pb-3 flex items-center justify-between gap-1">
                {{-- Logo --}}
                <div class="w-[10%] hidden md:block md:ms-[13px]">
                    <a href="{{ url('admin/dashboard') }}">
                        <x-application-logo class="text-[30px]" />
                    </a>
                </div>
                
                {{-- Topbar --}}
                <div class="flex-1">
                    <x-bar.topbar />
                </div>
            </div>
        </header>

        <!-- Content -->
        <main>
            <div class="flex flex-col md:flex-row md:gap-5">

                {{-- sidebar --}}
                <div class="w-full md:w-[10%]">
                    <x-bar.sidebar />
                </div>

                {{-- data --}}
                <div class="w-full md:flex-1">
                    {{ $slot }}
                </div>

            </div>
        </main>

    </div>
</body>

</html>
