<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <!-- ICO -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Fallback PNG -->
    <link rel="icon" href="{{ asset('assets/image/brand.png') }}" type="image/png">

    <title>{{ config('app.name', 'Beenite') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex sm:justify-center items-center sm:pt-0 bg-gray-100">

        <!-- Session Status -->
        <div class="w-full max-w-md bg-white shadow-lg rounded-2xl flex items-center justify-center overflow-hidden">
            <div class="w-full h-full scale-[0.85] flex flex-col ">
                {{ $slot }}
            </div>
        </div>

    </div>
</body>

</html>
