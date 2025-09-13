@props([
    'type' => 'general',
    'menu' => [],
    'showAuthLinks' => false,
    'showSettings' => false,
])

<nav x-data="{ open: false }"
    class="
    {{ $type === 'general' ? 'bg-blue-600 text-white shadow-md border-b-2 border-black' : '' }}
    {{ $type === 'dashboard' ? 'bg-white border-b border-gray-100' : '' }}
    {{ $type === 'landing' ? 'bg-blue-600 text-white shadow-md border-b-2 border-black' : '' }}
">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Brand (Logo selalu di kiri) -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="font-bold text-xl">
                    {{ config('app.name') }}
                </a>
            </div>

            <!-- Navigation / Auth Links -->
            @if ($type === 'dashboard')
                <!-- Dashboard Nav -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            @else
                <!-- General / Landing Menu -->
                <div class="hidden md:flex md:items-center space-x-6">
                    {{-- Show Menu (Home, Learn, Practice) --}}
                    @if (!empty($menu))
                        @foreach ($menu as $item)
                            <x-nav-link :href="$item['url']" :active="request()->is(ltrim($item['url'], '/'))">
                                {{ $item['name'] }}
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
                                            <img class="h-8 w-8 rounded-full object-cover"
                                                src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                                                alt="{{ Auth::user()->name }}">
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
                            <x-nav-link :href="route('login')">Login</x-nav-link>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="px-4 py-2 border border-white rounded-md text-sm hover:bg-white hover:text-blue-600 transition">
                                    Register
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
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @endif

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
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

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        @if ($type === 'dashboard')
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @else
            <div class="pt-2 pb-3 space-y-1">
                @if (!empty($menu))
                    @foreach ($menu as $item)
                        <x-responsive-nav-link :href="$item['url']" :active="request()->is(ltrim($item['url'], '/'))">
                            {{ $item['name'] }}
                        </x-responsive-nav-link>
                    @endforeach
                @endif

                @if ($showAuthLinks)
                    @auth
                        <div class="pt-4 pb-1 border-t border-gray-200">
                            <div class="px-4">
                                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                            </div>

                            <div class="mt-3 space-y-1">
                                <x-responsive-nav-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-responsive-nav-link>

                                @if ($showSettings)
                                    <x-responsive-nav-link :href="route('settings')">
                                        {{ __('Settings') }}
                                    </x-responsive-nav-link>
                                @endif

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-responsive-nav-link>
                                </form>
                            </div>
                        </div>
                    @else
                        <x-responsive-nav-link :href="route('login')">Login</x-responsive-nav-link>
                        @if (Route::has('register'))
                            <x-responsive-nav-link :href="route('register')">Register</x-responsive-nav-link>
                        @endif
                    @endauth
                @endif

            </div>
        @endif
    </div>
</nav>
