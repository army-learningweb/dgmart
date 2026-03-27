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

<body class="font-sans antialiased dark:text-gray-100 dark:bg-[#18181b] bg-white">
    <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0">

        <div
            class="mt-1 flex justify-center shadow-md dark:bg-[#1e1f20] p-2 rounded-full absolute right-6 top-6">
            <x-button.button-switch-mode />
        </div>

        <div>
            <a href="/">
                <x-application-logo />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-4 px-6 py-3 overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>



    </div>
</body>

</html>
