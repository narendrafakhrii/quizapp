<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <!-- Favicon -->
    <!-- ICO -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Fallback PNG -->
    <link rel="icon" href="{{ asset('assets/image/brand.png') }}" type="image/png">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Navigation Bar -->
    <x-navigation type="general" :menu="$menu ?? []" :showAuthLinks="true" />


    <div class="relative isolate px-6 lg:px-8">
        <div aria-hidden="true"
            class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
            <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"
                class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-288.75">
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-6 p-6 pt-35 max-w-7xl mx-auto mt-4">
        <h2 class="text-center justify-center font-bold text-3xl">{{ __('Play Quiz') }}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-16 p-6 pt-35 max-w-6xl mx-auto text-center">
            @foreach ($categories as $cat)
                <x-card.quiz-card :title="$cat['title']" :description="$cat['description']" :href="route('quiz.show', $cat['slug'])" buttonText='Play' />
            @endforeach
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-6 p-6 pt-35 max-w-6xl mx-auto">
        <h2 class="text-center justify-center font-bold text-3xl">{{ __('Simulation') }}</h2>
        <!-- Card Simulation -->
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">

            <div class="w-full h-40 bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                <span class="text-white font-bold text-lg">{{ __('Start Simulation') }}</span>
            </div>

            <div class="p-4">
                <h3 class="text-lg font-bold">{{ __('UTBK Simulation') }}</h3>
                <p class="text-gray-600 mt-2">
                    {{ __('Test your skills and tackle UTBK-style questions ranging from grammar and vocabulary to reading, and see how prepared you are for the real exam.') }}
                </p>
                <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600"
                    onclick="window.location.href='{{ route('simulation.show') }}'">{{ __('Start') }}</button>
            </div>
        </div>

    </div>

    {{-- Footer --}}
    @include('layouts.footer')

</body>

</html>
