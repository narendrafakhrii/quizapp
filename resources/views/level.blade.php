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
    <header>
        <h2 class="">Level Quiz</h2>
    </header>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6 pt-35 max-w-6xl mx-auto">
        <x-card.level-card level="Newbie" description="Deskripsi singkat." href="{{ route('quiz') }}" />

        <x-card.level-card level="Intermediate" description="Deskripsi singkat." href="{{ route('quiz') }}" />

        <x-card.level-card level="Expert" description="Deskripsi singkat." href="{{ route('quiz') }}" />
    </div>
</body>

</html>
