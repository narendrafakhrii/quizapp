@props([
    'title' => 'Judul Kartu',
    'description' => 'Deskripsi singkat tentang kartu ini.',
    'image' => 'https://placehold.co/600x400',
    'href' => route('level'),
    'buttonText' => 'Lihat',
])

<div class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col h-full">
    <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-40 object-cover">
    <div class="p-4 flex-1 flex flex-col justify-between">
        <div>
            <h3 class="text-lg font-semibold">{{ $title }}</h3>
            <p class="text-gray-600 mt-2">{{ $description }}</p>
        </div>
        <a href="{{ $href }}"
            class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 inline-block mx-auto text-center">
            {{ $buttonText }}
        </a>
    </div>
</div>
