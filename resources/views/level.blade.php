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
    <header class="flex justify-center items-center">
        <h2 class="text-4xl font-bold mt-20">Level Quiz</h2>
    </header>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6 pt-35 max-w-6xl mx-auto">
        <x-card.level-card level="Newbie" description="Level dasar untuk pemula. Soal-soal grammar fundamental." href="{{ route('quiz', ['level' => 'newbie', 'category' => 'grammar']) }}" />

        <x-card.level-card level="Intermediate" description="Level menengah dengan grammar yang lebih kompleks." href="{{ route('quiz', ['level' => 'intermediate', 'category' => 'grammar']) }}" />

        <x-card.level-card level="Expert" description="Level ahli dengan grammar tingkat lanjut." href="{{ route('quiz', ['level' => 'expert', 'category' => 'grammar']) }}" />
    </div>
</body>

</html>
