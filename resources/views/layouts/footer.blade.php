<footer class="bg-blue-800 text-gray-300 py-10 mt-40">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- Logo + Brand -->
        <div>
            <div class="flex items-center space-x-3 mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10">
                <span class="text-xl font-bold text-white">{{ config('app.name') }}</span>
            </div>
            <p class="text-sm leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
            </p>
        </div>

        <!-- Quick Links -->
        <div>
            <h3 class="text-white font-semibold text-lg mb-4">Quick Links</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('home') }}" class="hover:text-white transition">{{ __('Home') }}</a></li>
                <li><a href="{{ route('learn.index') }}" class="hover:text-white transition">{{ __('Learn') }}</a>
                </li>
                <li><a href="{{ route('practice') }}" class="hover:text-white transition">{{ __('Practice') }}</a></li>
            </ul>
        </div>

        <!-- Contact -->
        <div>
            <h3 class="text-white font-semibold text-lg mb-4">{{ __('Contact') }}</h3>
            <a href="mailto:alfabee.quizy@gmail.com"
                class="flex items-center space-x-3 mb-3 hover:text-white transition">
                <!-- Email SVG -->
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 12H8m8-4H8m-2 8h12M4 6h16v12H4z" />
                </svg>
                <span>alfabee.quizy@gmail.com</span>
            </a>
            <div class="flex items-center space-x-3">
                <!-- Phone SVG -->
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 12H8m12 5V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 7l-10 7L2 7" />
                </svg>
                <span>+62 812 3456 7890</span>
            </div>
        </div>
    </div>

    <!-- Bottom -->
    <div class="border-t border-gray-700 mt-10 pt-6 text-center text-sm text-gray-400">
        &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    </div>
</footer>
