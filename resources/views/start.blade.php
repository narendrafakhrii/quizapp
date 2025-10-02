<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/image/brand.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased flex flex-col min-h-screen relative bg-no-repeat overflow-x-hidden"
    style="
        background-image: url('{{ asset('assets/image/start-background.png') }}'),
                          linear-gradient(to top, #A8DAEF 0%, #4AC3F3 50%, #E0F4FF 100%);
        background-size: 100% auto, 100% 100%;
        background-position: bottom center, top;
        background-repeat: no-repeat, no-repeat;
        background-blend-mode: normal;
    ">

    <!-- Overlay lebih tipis untuk siang hari -->
    <div class="absolute inset-0 bg-black/10 z-0"></div>

    <!-- Navbar -->
    <x-navigation type="landing" :showAuthLinks="true" />

    <!-- Content -->
    <main class="flex flex-col flex-grow items-center justify-center text-center min-h-screen relative z-10"
        x-data="{
            showH1: false,
            showP: false,
            showBtn: false
        }" x-init="setTimeout(() => showH1 = true, 300);
        setTimeout(() => showP = true, 900);
        setTimeout(() => showBtn = true, 1500);">

        <!-- Judul -->
        <h1 class="text-5xl sm:text-7xl font-extrabold tracking-tight text-white transform transition-all duration-1000 drop-shadow-lg"
            x-bind:class="showH1 ? 'opacity-100 translate-y-0 animate-float' : 'opacity-0 -translate-y-12'">
            {{ config('app.name') }}
        </h1>

        <!-- Sub Judul -->
        <p class="mt-8 text-lg sm:text-xl font-medium text-white transform transition-all duration-1000 drop-shadow-md"
            x-bind:class="showP ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
            {{ __('Be Expert English') }}
        </p>

        <!-- Tombol -->
        <x-button.primary-button class="mt-10 transform transition-all duration-1000"
            x-bind:class="showBtn ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
            <a href="{{ route('login') }}">{{ __('Get Started') }}</a>
        </x-button.primary-button>

        {{-- Bus animation --}}
        <div class="absolute bottom-0 left-0 w-full h-24 pointer-events-none" x-data="{
            busX: -200,
            screenWidth: window.innerWidth,
            animationFrame: null,
            moveBus() {
                const animate = () => {
                    this.busX += 1.5;
                    if (this.busX > this.screenWidth + 200) {
                        this.busX = -200;
                    }
                    this.animationFrame = requestAnimationFrame(animate);
                };
                this.animationFrame = requestAnimationFrame(animate);
            }
        }"
            x-init="screenWidth = window.innerWidth;
            moveBus();">
            <img src="{{ asset('assets/image/bus.png') }}" alt="Bus" class="absolute h-20 w-auto bottom-0"
                :style="`left: ${busX}px; transform: translateZ(0);`">
        </div>
    </main>

    <!-- Animasi -->
    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</body>

</html>
