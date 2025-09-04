@props([
    'level' => 'Newbie',
    'description' => 'Deskripsi singkat',
    'href' => '#',
])

@php
    $gradients = [
        'Newbie' => 'from-green-100 to-white',
        'Easy' => 'from-yellow-100 to-white',
        'Insane' => 'from-red-100 to-white',
    ];

    $gradient = $gradients[$level] ?? 'from-gray-100 to-white';
@endphp

<div class="w-full">
    <div
        class="rounded-2xl shadow-md border p-4 flex flex-col justify-between bg-gradient-to-t {{ $gradient }} hover:shadow-lg transition duration-300 h-full">
        <div class="text-center flex-1">
            <h2 class="text-lg font-bold mb-2">{{ $level }}</h2>
            <p class="text-sm text-gray-700">{{ $description }}</p>
        </div>
        <div class="mt-4 text-center">
            <a href="{{ $href }}"
                class="inline-block px-6 py-2 rounded-lg bg-white text-gray-800 font-medium shadow hover:bg-gray-100 transition duration-200">
                Pilih
            </a>
        </div>
    </div>
</div>
