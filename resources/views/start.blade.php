<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased flex flex-col min-h-screen">
    <x-navigation type="landing" :showAuthLinks="true" />

    <main
        class="flex flex-col flex-grow items-center justify-center text-center bg-[url('./assets/image/start-background.png')]">
        <h1 class="text-5xl font-extrabold tracking-tight text-balance sm:text-7xl">
            {{ config('app.name') }}
        </h1>
        <p class="mt-8 text-lg font-medium text-pretty text-gray-400 sm:text-xl/8">
            Be Expert English
        </p>
        <x-button.primary-button class="mt-10">
            <a href="{{ route('login') }}">Get Started</a>
        </x-button.primary-button>
    </main>
</body>


</html>
