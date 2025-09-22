<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Navigation Bar -->
    <x-navigation type="general" :menu="$menu ?? []" :showAuthLinks="true" />

    <!-- Main Content -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6 max-w-6xl mx-auto text-center">
        @foreach ($learns as $learn)
            <x-card.learn-card :title="$learn->title" :description="Str::limit($learn->content, 100)" image="https://placehold.co/600x400" buttonText="Lihat"
                :href="route('learn.show', $learn->id)" />
        @endforeach
    </div>

</body>

</html>
