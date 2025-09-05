<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hessome</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
        @endif
            <style> 
                @import url('https://fonts.googleapis.com/css2?family=Bowlby+One&family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Outfit:wght@100..900&display=swap'); @import url('https://fonts.googleapis.com/css2?family=Bowlby+One&family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Outfit:wght@100..900&display=swap');               
                @keyframes float {
                0%, 100% { transform: translateY(0); }
                50% { transform: translateY(-10px); }
                }
            </style>
            <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
            <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-center gap-4">
                    <div class="flex lg:flex-1">
                        <a href="home" class="-m-1.5 p-1.5">
                            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="" class="h-8 w-auto" />
                        </a>
                    </div>
                    <div class="hidden lg:flex lg:flex-3 lg:justify-center lg:gap-x-15 font-['Outfit'] z-50">
                        <a href="learn" class="text-md text-white">Learn</a>
                        <a href="practice" class="text-md text-white">Practice</a>
                    </div>
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
        <div class="relative isolate px-6 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
                <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-288.75"></div>
            </div>
            <div class="mx-auto max-w-2xl py-12">
                <div class="text-center">
                    <div class="animate-[float_4s_ease-in-out_infinite]">
                        <h1 class="text-2xl font-['Crimson_Text'] font-bold text-pretty text-white p-6" style="letter-spacing: 0.5em;">WELCOME TO</h1>
                        <h1 class="text-7xl font-['Bowlby_One'] bg-gradient-to-b from-white to-yellow-400 bg-clip-text text-transparent drop-shadow-[0px_8px_0px_#000000] text-balance sm:text-7xl">HES SOME</h1>
                    </div>
                    <p class="font-['Outfit'] mt-8 text-lg font-medium text-pretty text-white sm:text-xl/8">Helping English Skills by Studying on Game.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="home" class="font-['Outfit'] rounded-md bg-indigo-500 px-10 py-1.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Get started</a>
                    </div>
                </div>
            </div>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
