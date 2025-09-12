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

<body>
    <!-- Navigation Bar -->
    <x-nav-bar :menu="[
        ['name' => 'Home', 'url' => '/home'],
        ['name' => 'Learn', 'url' => '/learn'],
        ['name' => 'Practice', 'url' => '/practice'],
    ]" :showMenu="true" :showSettings="true" />

    <!-- Main Content -->
    <x-card.primary-card class="mt-6 bg-gray-300 ">
        <x-mascot-text />
    </x-card.primary-card>
</body>

</html>
