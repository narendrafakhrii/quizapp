<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Navigation Bar -->
    <x-navigation type="general" :menu="$menu ?? []" :showAuthLinks="true" />

    <!-- Main Content -->
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ __('Learn English') }}</h1>
                <p class="text-lg text-gray-600">Pilih materi yang ingin Anda pelajari</p>
            </div>

            <!-- Cards Grid - 4 Materi Tetap -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach ($learns as $learn)
                    <x-card.learn-card :title="$learn['title']" :group="$learn['group']" :slides="$learn['slides']" :icon="$learn['icon']"
                        :progress="$learn['progress']" />
                @endforeach
            </div>
        </div>
    </div>

    {{-- Layouts --}}
    @include('layouts.footer')
</body>

</html>
