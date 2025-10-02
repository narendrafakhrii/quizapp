<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Navigation Bar -->
    <x-navigation type="general" :menu="$menu ?? []" :showAuthLinks="true" />

    <!-- Main Content -->
    <div class="min-h-screen py-8">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ __('Learn English') }}</h1>
                <p class="text-lg text-gray-600">{{ __('Choose the material you want to learn') }}
                </p>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach ($learns as $index => $learn)
                    <div x-data="{ show: false }" x-intersect.once="show = true" x-init="setTimeout(() => { if (!show) show = true }, {{ 200 + $index * 200 }})"
                        class="transform">
                        <div x-show="show" x-transition:enter="transition ease-in-out duration-1000"
                            x-transition:enter-start="opacity-0 {{ $index % 2 === 0 ? '-translate-y-6' : 'translate-y-6' }}"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            style="transition-delay: {{ $index * 200 }}ms" x-cloak>
                            <x-card.learn-card :title="$learn['title']" :group="$learn['group']" :slides="$learn['slides']" :icon="$learn['icon']"
                                :progress="$learn['progress']" />
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    {{-- Layouts --}}
    @include('layouts.footer')
</body>

</html>
