<footer class="bg-blue-800 text-gray-300 py-10 mt-40">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- Logo + Brand -->
        <div>
            <div class="flex items-center space-x-3 mb-4">
                <img src="{{ asset('assets/image/brand.png') }}" alt="Logo" class="h-10 w-10">
                <span class="text-xl font-bold text-white">{{ config('app.name') }}</span>
            </div>
            <p class="text-sm leading-relaxed">
                {{ __('footer.description') }}
            </p>
        </div>

        <!-- Quick Links -->
        <div>
            <h3 class="text-white font-semibold text-lg mb-4">{{ __('footer.quick_links') }}</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('home') }}" class="hover:text-white transition">{{ __('footer.home') }}</a></li>
                <li><a href="{{ route('learn.index') }}"
                        class="hover:text-white transition">{{ __('footer.learn') }}</a></li>
                <li><a href="{{ route('practice') }}"
                        class="hover:text-white transition">{{ __('footer.practice') }}</a></li>
            </ul>
        </div>

        <!-- Contact -->
        <div>
            <h3 class="text-white font-semibold text-lg mb-4">{{ __('footer.contact') }}</h3>
            <a href="mailto:alfabee.quizy@gmail.com"
                class="flex items-center space-x-3 mb-3 hover:text-white transition">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 12H8m8-4H8m-2 8h12M4 6h16v12H4z" />
                </svg>
                <span>alfabee.quizy@gmail.com</span>
            </a>
        </div>
    </div>
</footer>
