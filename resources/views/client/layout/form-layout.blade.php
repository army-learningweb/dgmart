<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-white">
    <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0">

        <div class="flex gap-10 w-[900px] {{ $errors->any() ? '' : 'animate_reveal' }}">
            <div class="flex-1">
                <a href="/">
                    <x-application-logo class="text-5xl py-4" />
                </a>

                <div class="w-full py-3">
                    {{ $slot }}
                </div>
            </div>
            
           <div class="w-[55%] p-5 bg-[#fafafa] rounded-2xl border border-gray-200">
                <img src="{{ asset('images/login.svg') }}" alt="" class="w-full h-full object-contain">
            </div>
        </div>

        <x-flash-session.success-flash-session right="right-32"/>
    </div>
</body>

</html>
