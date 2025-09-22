<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - Learn</title>
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
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Learn English</h1>
                <p class="text-lg text-gray-600">Pilih materi yang ingin Anda pelajari</p>
            </div>

            <!-- Cards Grid - Hanya 3 card -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($learns as $learn)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <!-- Card Image -->
                        <div class="h-48 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                            <div class="text-white text-center">
                                <div class="text-4xl mb-2">📚</div>
                                <h3 class="text-xl font-semibold">{{ $learn->title }}</h3>
                            </div>
                        </div>
                        
                        <!-- Card Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $learn->title }}</h3>
                            <p class="text-gray-600 mb-4">
                                Pelajari {{ strtolower($learn->title) }} dengan {{ $learn->total_slides }} slide interaktif yang mencakup materi dan latihan soal.
                            </p>
                            
                            <!-- Stats -->
                            <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                                <span>{{ $learn->total_slides }} Slides</span>
                                <span>~{{ $learn->total_slides * 2 }} menit</span>
                            </div>
                            
                            <!-- Action Button -->
                            <a href="{{ route('learn.show', $learn->learn_group) }}" 
                               class="block w-full bg-blue-600 text-white text-center py-3 px-4 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-200">
                                Mulai Belajar
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>