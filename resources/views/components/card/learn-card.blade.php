@props(['title', 'group', 'slides', 'icon', 'progress' => 0])

<section
    class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-shadow duration-300 max-w-md mx-auto">

    <!-- Card Icon -->
    <div class="h-56 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
        <div class="text-white text-center">
            <div class="text-5xl mb-3">{!! $icon !!}</div>
            <h3 class="text-2xl font-bold">{{ $title }}</h3>
        </div>
    </div>

    <!-- Card Content -->
    <div class="p-8 flex flex-col justify-between min-h-[260px]">
        <p class="text-gray-700 mb-6 flex-1 leading-relaxed">
            Pelajari {{ strtolower($title) }} dengan {{ $slides }} slide interaktif yang mencakup materi dan
            latihan soal.
        </p>

        <!-- Stats -->
        <div class="flex items-center justify-between text-sm text-gray-500 mb-6">
            <span>{{ $slides }} Slides</span>

            <!-- Progress Circle -->
            <div class="relative w-12 h-12">
                <svg class="w-full h-full transform -rotate-90">
                    <!-- Background circle -->
                    <circle cx="24" cy="24" r="20" stroke="#e5e7eb" stroke-width="4" fill="none" />

                    <!-- Progress circle -->
                    <circle cx="24" cy="24" r="20" stroke="url(#grad)" stroke-width="4" fill="none"
                        stroke-dasharray="125.6" stroke-dashoffset="{{ 125.6 - (125.6 * $progress) / 100 }}"
                        stroke-linecap="round" />

                    <defs>
                        <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#3b82f6" />
                            <stop offset="100%" stop-color="#8b5cf6" />
                        </linearGradient>
                    </defs>
                </svg>

                <!-- Progress text -->
                <div class="absolute inset-0 flex items-center justify-center text-xs font-semibold text-gray-700">
                    {{ $progress }}%
                </div>
            </div>
        </div>

        <!-- Action Button -->
        <x-button.card-button href="{{ route('learn.show', ['group' => $group]) }}"
            class="block w-full bg-blue-600 text-white text-center py-3 px-6 rounded-xl font-semibold hover:bg-blue-700 transition-colors duration-200">
            {{ __('Start Learn') }}
        </x-button.card-button>
    </div>
</section>
