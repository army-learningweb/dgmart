<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <script>
        let dark_mode = localStorage.getItem('dark_mode');
        if (dark_mode == 'true') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

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

<body
    class="font-sans antialiased dark:text-gray-300 dark:bg-[#18181b] bg-white transition-colors duration-350 text-sm md:w-[1440px] mx-auto px-3 md:px-0">
    <div class="min-h-screen">
        <!-- Header -->
        <header>
            <div class="w-full py-4 flex items-center justify-between">
                <div class="flex items-center gap-8">
                    {{-- Logo --}}
                    <div class="hidden md:block md:ms-[13px]">
                        <a href="/">
                            <x-application-logo class="text-[30px]" />
                        </a>
                    </div>
                    {{-- title page --}}
                    <div>
                         <div class="text-xl">Dashboard</div>
                    </div>
                </div>
                

                {{-- Topbar --}}
                <div>
                    <x-topbar />
                </div>
            </div>
        </header>

        <!-- Content -->
        <main>
            <div class="flex flex-col md:flex-row md:gap-5">

                {{-- sidebar --}}
                <div class="w-full md:w-[10%]">
                    <x-sidebar />
                </div>

                {{-- data --}}
                <div class="w-full md:w-[90%]">
                    {{ $slot }}
                </div>
            </div>
        </main>

    </div>
</body>

</html>
