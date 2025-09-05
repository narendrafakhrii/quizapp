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
    <div class="bg-gray-900 min-h-screen">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav aria-label="Global" class="flex items-center justify-between p-6 lg:px-8">
                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5">
                        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="" class="h-8 w-auto" />
                    </a>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="home" class="text-sm/6 font-semibold text-white">Home</a>
                    <a href="learn" class="text-sm/6 font-semibold underline text-white">Learn</a>
                    <a href="practice" class="text-sm/6 font-semibold text-white">Practice</a>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end lg:gap-x-12">
                    <a href="#" class="text-sm/6 font-semibold text-white">Log in</a>
                    <a href="#" class="text-sm/6 font-semibold text-white">Register</a>
                </div>
            </nav>
        </header>

        <div class="relative isolate px-6 lg:px-8">
            <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
                <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-288.75"></div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6 pt-35 max-w-6xl mx-auto text-center">
            <!-- Card 1 -->
            <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                <img src="https://media.tenor.com/KeWvZtKaSLYAAAAM/koree-antonio-rizz.gif" alt="Gambar" class="w-full h-30 object-cover">
                <div class="p-4">
                <h3 class="text-lg font-semibold">Grammar</h3>
                <p class="text-gray-600 mt-2">Deskripsi singkat tentang kartu ini.</p>
                <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Lihat</button>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                <img src="/images/koree-antonio-rizz.gif" alt="Gambar" class="w-full h-40 object-cover">
                <div class="p-4">
                <h3 class="text-lg font-semibold">Vocabulary</h3>
                <p class="text-gray-600 mt-2">Deskripsi singkat tentang kartu ini.</p>
                <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Lihat</button>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                <img src="https://placehold.co/600x400" alt="Gambar" class="w-full h-40 object-cover">
                <div class="p-4">
                <h3 class="text-lg font-semibold">Reading Comprehension</h3>
                <p class="text-gray-600 mt-2">Deskripsi singkat tentang kartu ini.</p>
                <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Lihat</button>
                </div>
            </div>
        </div>
    </div>
        
</body>
</html>