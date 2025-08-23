<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>

    <title>Hessome</title>
</head>

<body>
    <div class="bg-gray-900">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav aria-label="Global" class="flex items-center justify-between p-6 lg:px-8">
                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5">
                        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="" class="h-8 w-auto" />
                    </a>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="home" class="text-sm/6 font-semibold underline text-white">Home</a>
                    <a href="learn" class="text-sm/6 font-semibold text-white">Learn</a>
                    <a href="practice" class="text-sm/6 font-semibold text-white">Practice</a>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end lg:gap-x-12">
                    <a href="#" id=btnLogin class="text-sm/6 font-semibold text-white">Log in</a>
                    <a href="#" id=btnRegister class="text-sm/6 font-semibold text-white">Register</a>
                </div>
            </nav>
        </header>

        <div class="relative isolate px-6 lg:px-8">
            <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
                <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-288.75"></div>
            </div>
            <div class="mx-auto max-w-2xl py-32 sm:py-48">
                <div class="text-center">
                    <h1 class="text-5xl font-semibold tracking-tight text-balance text-white sm:text-7xl">HES SOME</h1>
                    <p class="mt-8 text-lg font-medium text-pretty text-gray-400 sm:text-xl/8">Helps English Skills by Studying in Game.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="#" class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Get started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>