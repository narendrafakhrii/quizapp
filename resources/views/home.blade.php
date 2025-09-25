<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="flex flex-col min-h-screen">
    <!-- Navigation Bar -->
    <x-navigation type="general" :menu="$menu ?? []" :showAuthLinks="true" />

    <!-- Main Content -->
    <main class="flex-grow">
        {{-- Mascot --}}
        <div class="mt-10 flex items-center justify-center space-x-4 mb-8">
            <img src="favicon.ico" class="w-10 h-10">
            <x-mascot-text class="w-full min-w-7md bg-gray-200 rounded-md p-4" />
        </div>

        <div class="flex flex-col mx-8 ">
            <h2 class="font-semibold lg:text-2xl mb-4">{{ __('Start new learn') }}</h2>
            <x-card.primary-card>

                <div
                    class="bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900 rounded-2xl p-6 text-white relative overflow-hidden shadow-xl">

                    {{-- Course info --}}
                    <div class="mb-12">
                        <p class="text-sm text-white/70 mb-2 tracking-wider uppercase">{{ __('Learn') }}</p>
                        <h3 class="text-3xl font-bold mb-4">{{ __('Grammar') }}</h3>
                    </div>

                    <div class="mb-1">
                        <p class="text-sm text-white mb-2 ">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Fugit quisquam cumque voluptate, magnam quaerat molestias! Hic, dignissimos quia. Itaque
                            architecto ullam dolorem nobis nostrum aliquam similique consectetur consequatur sunt
                            placeat?</p>
                    </div>

                    {{-- Buttons --}}
                    <div class="flex gap-4 mt-6">
                        <x-button.card-button
                            class="bg-blue-500 hover:bg-blue-600 px-6 py-3 rounded-lg font-semibold text-white transition-colors"
                            href="{{ route('learn.index') }}">
                            {{ __('Start Learning') }}
                        </x-button.card-button>

                    </div>

                    {{-- Decorative elements --}}
                    <div
                        class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-bl from-purple-600/30 to-transparent rounded-full -translate-y-32 translate-x-32">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 w-48 h-48 bg-gradient-to-tr from-blue-600/20 to-transparent rounded-full translate-y-24 -translate-x-24">
                    </div>
                </div>
            </x-card.primary-card>
        </div>

    </main>

    {{-- Footer --}}
    @include('layouts.footer')
</body>

</html>
