@props([
    'type' => 'general',
    'menu' => [],
    'showAuthLinks' => false,
    'showSettings' => false,
])

<nav x-data="{ open: false, showAccountMenu: false }"
    class="sticky top-0 z-50
    {{ $type === 'general' ? 'bg-blue-600 text-white shadow-md border-b-2 border-black' : '' }}
    {{ $type === 'dashboard' ? 'bg-white border-b border-gray-100' : '' }}
    {{ $type === 'landing' ? 'bg-blue-600 text-white shadow-md border-b-2 border-black' : '' }}
">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Brand (Logo selalu di kiri) -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="font-bold text-3xl">
                    {{ config('app.name') }}
                </a>
            </div>

            <!-- Navigation / Auth Links -->
            @if ($type === 'dashboard')
                <!-- Dashboard Nav -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                </div>
            @else
                <!-- General / Landing Menu -->
                <div class="hidden md:flex md:items-center space-x-6">
                    {{-- Show Menu (Home, Learn, Practice) --}}
                    @if (!empty($menu))
                        @foreach ($menu as $item)
                            <x-nav-link :href="$item['url']" :active="request()->is(trim(parse_url($item['url'], PHP_URL_PATH), '/'))">
                                {{ is_array($item['name']) ? $item['name'][app()->getLocale()] ?? '' : (string) $item['name'] }}
                            </x-nav-link>
                        @endforeach
                    @endif

                    {{-- Show Auth Links (di kanan untuk landing & general) --}}
                    @if ($showAuthLinks)
                        @auth
                            <!-- Avatar / Profile Dropdown -->
                            <div class="hidden sm:flex sm:items-center sm:ms-6">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button
                                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-white transition">
                                            <img class="h-10 w-10 rounded-full object-cover"
                                                src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name ?? '') }}"
                                                alt="{{ Auth::user()->name ?? 'User' }}">
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('profile.edit')">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>

                                        @if ($showSettings)
                                            <x-dropdown-link :href="route('settings')">
                                                {{ __('Settings') }}
                                            </x-dropdown-link>
                                        @endif

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        @else
                            <x-nav-link :href="route('login')">{{ __('Login') }}</x-nav-link>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="px-4 py-2 border border-white rounded-md text-sm hover:bg-white hover:text-blue-600 transition">
                                    {{ __('Register') }}
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            @endif

            {{-- Settings dropdown (Dashboard only) --}}
            @if ($type === 'dashboard')
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @endif

            <!-- Hamburger -->
            <div class="-me-2 flex items-center md:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md {{ $type === 'dashboard' ? 'text-gray-400 hover:text-gray-500 hover:bg-gray-100' : 'text-white hover:text-gray-200 hover:bg-blue-700' }} focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Overlay -->
    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95" class="fixed inset-0 bg-white z-50 md:hidden"
        @click.outside="open = false" style="display: none;">

        <!-- Mobile Header -->
        <div class="flex items-center justify-between p-4 border-b border-gray-200">
            <div class="text-xl font-bold text-gray-900">
                <span x-show="!showAccountMenu">Menu</span>
                <span x-show="showAccountMenu">Account</span>
            </div>
            <button @click="open = false" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Mobile Navigation Content -->
        <div class="p-4">
            <!-- Main Menu -->
            <div x-show="!showAccountMenu">
                @if ($type === 'dashboard')
                    <!-- Dashboard Mobile Menu -->
                    <nav class="space-y-4">
                        <a href="{{ route('home') }}"
                            class="block py-3 text-lg font-medium text-gray-900 hover:text-blue-600 transition-colors {{ request()->routeIs('home') ? 'text-blue-600' : '' }}">
                            {{ __('Home') }}
                        </a>
                    </nav>

                    <!-- Dashboard User Info -->
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <div class="flex items-center space-x-3 mb-4">
                            <img class="w-10 h-10 rounded-full object-cover"
                                src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name ?? '') }}"
                                alt="{{ Auth::user()->name ?? 'User' }}">
                            <div>
                                <div class="font-medium text-gray-900">{{ Auth::user()->name ?? 'User' }}</div>
                                <div class="text-sm text-gray-500">{{ Auth::user()->email ?? '' }}</div>
                            </div>
                        </div>
                        <nav class="space-y-4">
                            <a href="{{ route('profile.edit') }}"
                                class="flex items-center space-x-3 py-3 text-lg font-medium text-gray-900 hover:text-blue-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>{{ __('Profile') }}</span>
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="flex items-center space-x-3 py-3 text-lg font-medium text-red-600 hover:text-red-700 transition-colors w-full text-left">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    <span>{{ __('Log Out') }}</span>
                                </button>
                            </form>
                        </nav>
                    </div>
                @else
                    <!-- General/Landing Mobile Menu -->
                    <nav class="space-y-4">
                        @if (!empty($menu))
                            @foreach ($menu as $item)
                                <a href="{{ $item['url'] }}"
                                    class="block py-3 text-lg font-medium text-gray-900 hover:text-blue-600 transition-colors {{ request()->is(trim(parse_url($item['url'], PHP_URL_PATH), '/')) ? 'text-blue-600' : '' }}">
                                    {{ is_array($item['name']) ? $item['name'][app()->getLocale()] ?? '' : (string) $item['name'] }}
                                </a>
                            @endforeach
                        @endif

                        @if ($showAuthLinks)
                            @auth
                                <!-- Account Menu Trigger -->
                                <button @click="showAccountMenu = true"
                                    class="flex items-center justify-between w-full py-3 text-lg font-medium text-gray-900 hover:text-blue-600 transition-colors">
                                    <div class="flex items-center space-x-3">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                            src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name ?? '') }}"
                                            alt="{{ Auth::user()->name ?? 'User' }}">
                                        <span>{{ __('Account') }}</span>
                                    </div>
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            @else
                                <a href="{{ route('login') }}"
                                    class="block py-3 text-lg font-medium text-gray-900 hover:text-blue-600 transition-colors">
                                    {{ __('Login') }}
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="block py-3 text-lg font-medium text-gray-900 hover:text-blue-600 transition-colors">
                                        {{ __('Register') }}
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </nav>
                @endif
            </div>

            <!-- Account Submenu (General/Landing only) -->
            @if ($type !== 'dashboard' && $showAuthLinks)
                @auth
                    <div x-show="showAccountMenu" style="display: none;">
                        <nav class="space-y-4">
                            <a href="{{ route('profile.edit') }}"
                                class="flex items-center space-x-3 py-3 text-lg font-medium text-gray-900 hover:text-blue-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>{{ __('Profile') }}</span>
                            </a>

                            @if ($showSettings)
                                <a href="{{ route('settings') }}"
                                    class="flex items-center space-x-3 py-3 text-lg font-medium text-gray-900 hover:text-blue-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span>{{ __('Settings') }}</span>
                                </a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="flex items-center space-x-3 py-3 text-lg font-medium text-red-600 hover:text-red-700 transition-colors w-full text-left">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    <span>{{ __('Log Out') }}</span>
                                </button>
                            </form>

                            <!-- Back to Menu -->
                            <button @click="showAccountMenu = false"
                                class="flex items-center space-x-3 py-3 text-lg font-medium text-blue-600 hover:text-blue-700 transition-colors w-full text-left mt-6 pt-6 border-t border-gray-200">
                                <span>← {{ __('Back to Menu') }}</span>
                            </button>
                        </nav>
                    </div>
                @endauth
            @endif
        </div>
    </div>
</nav>
