@props([
    'type' => 'general',
    'menu' => [],
    'showAuthLinks' => false,
    'showSettings' => false,
])

<nav x-data="{ open: false, showAccountMenu: false }"
    class="
    {{ $type === 'general' ? 'bg-blue-600 text-white shadow-md border-b-2 border-black' : '' }}
    {{ $type === 'dashboard' ? 'bg-white border-b border-gray-100' : '' }}
    {{ $type === 'landing' ? 'bg-blue-600 text-white shadow-md border-b-2 border-black' : '' }}
">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Brand -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="font-bold text-3xl">
                    {{ config('app.name') }}
                </a>
            </div>

            <!-- Navigation / Auth Links -->
            <div class="hidden md:flex md:items-center space-x-6">
                {{-- Menu --}}
                @if (!empty($menu))
                    @foreach ($menu as $item)
                        <x-nav-link :href="$item['url']" :active="request()->is(trim(parse_url($item['url'], PHP_URL_PATH), '/'))">
                            {{ is_array($item['name']) ? $item['name'][app()->getLocale()] ?? '' : (string) $item['name'] }}
                        </x-nav-link>
                    @endforeach
                @endif

                {{-- Auth Links --}}
                @if ($showAuthLinks)
                    @auth
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
    <div x-show="open" x-transition class="fixed inset-0 bg-white z-50 md:hidden" @click.outside="open = false">
        <div class="p-4">
            @if (!empty($menu))
                @foreach ($menu as $item)
                    <a href="{{ $item['url'] }}"
                        class="block py-3 text-lg font-medium text-gray-900 hover:text-blue-600 transition-colors">
                        {{ is_array($item['name']) ? $item['name'][app()->getLocale()] ?? '' : (string) $item['name'] }}
                    </a>
                @endforeach
            @endif

            @if ($showAuthLinks)
                @auth
                    <a href="{{ route('profile.edit') }}"
                        class="block py-3 text-lg font-medium text-gray-900 hover:text-blue-600 transition-colors">
                        {{ __('Profile') }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="block py-3 text-lg font-medium text-red-600 hover:text-red-700 transition-colors w-full text-left">
                            {{ __('Log Out') }}
                        </button>
                    </form>
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
        </div>
    </div>
</nav>
