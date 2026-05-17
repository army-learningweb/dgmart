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

<body class="overflow-x-hidden font-sans antialiased text-sm px-3 md:px-0 scroll-smooth bg-gray-50">

    {{-- Layout --}}
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header>
            <div class="bg-white shadow-sm">
                <x-bar.client-topbar />
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1">
            <div class="md:max-w-7xl mx-auto relative pt-5 pb-10">
                {{ $slot }}
            </div>
        </main>

        <!-- Footer -->
        <footer>
            <div class="bg-white pt-10 pb-5">
                <x-footer.client-footer/>
            </div>
        </footer>
    </div>
</body>

</html>
