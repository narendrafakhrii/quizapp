@props([
    'brand' => config('app.name'),
    'menu' => [],
    'showMenu' => false,
    'showAuthLinks' => false,
    'showSettings' => false,
])

<nav class="bg-blue-600 text-white shadow-md border-b-2 border-black" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Brand -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="font-bold text-xl">{{ $brand }}</a>
            </div>

            <!-- Desktop Right Side -->
            <div class="hidden md:flex md:items-center space-x-6">
                {{-- Show Menu (Home, Learn, Practice) --}}
                @if ($showMenu)
                    @foreach ($menu as $item)
                        <x-nav-link :href="$item['url']" :active="request()->is(ltrim($item['url'], '/'))">
                            {{ $item['name'] }}
                        </x-nav-link>
                    @endforeach
                @endif

                {{-- Show Auth Links --}}
                @if ($showAuthLinks)
                    @auth
                        <x-nav-link :href="url('/dashboard')">Dashboard</x-nav-link>
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

                {{-- Settings Dropdown --}}
                @if ($showSettings)
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-white hover:text-gray-200 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066
                                        c1.543-.89 3.31.877 2.42 2.42a1.724 1.724 0 001.065
                                        2.572c1.757.426 1.757 2.924 0 3.35a1.724 1.724
                                        0 00-1.066 2.573c.89 1.543-.877 3.31-2.42
                                        2.42a1.724 1.724 0 00-2.572 1.065c-.426
                                        1.757-2.924 1.757-3.35 0a1.724 1.724 0
                                        00-2.573-1.066c-1.543.89-3.31-.877-2.42-2.42
                                        a1.724 1.724 0 00-1.065-2.572c-1.757-.426-1.757-2.924
                                        0-3.35a1.724 1.724 0 001.066-2.573c-.89-1.543.877-3.31
                                        2.42-2.42.996.574 2.26.23 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('profile.edit') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="#">
                                {{ __('Theme') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                @endif
            </div>

            <!-- Mobile Hamburger -->
            <div class="flex items-center md:hidden">
                <button @click="open = !open" class="focus:outline-none">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" class="md:hidden bg-blue-700 px-2 pt-2 pb-3 space-y-1">
        @if ($showMenu)
            @foreach ($menu as $item)
                <x-responsive-nav-link :href="$item['url']" :active="request()->is(ltrim($item['url'], '/'))">
                    {{ $item['name'] }}
                </x-responsive-nav-link>
            @endforeach
        @endif

        @if ($showAuthLinks)
            @auth
                <x-responsive-nav-link :href="url('/dashboard')">Dashboard</x-responsive-nav-link>
            @else
                <x-responsive-nav-link :href="route('login')">Login</x-responsive-nav-link>
                @if (Route::has('register'))
                    <x-responsive-nav-link :href="route('register')">Register</x-responsive-nav-link>
                @endif
            @endauth
        @endif

        @if ($showSettings)
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="flex items-center text-white hover:text-gray-200 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066
                                        c1.543-.89 3.31.877 2.42 2.42a1.724 1.724 0 001.065
                                        2.572c1.757.426 1.757 2.924 0 3.35a1.724 1.724
                                        0 00-1.066 2.573c.89 1.543-.877 3.31-2.42
                                        2.42a1.724 1.724 0 00-2.572 1.065c-.426
                                        1.757-2.924 1.757-3.35 0a1.724 1.724 0
                                        00-2.573-1.066c-1.543.89-3.31-.877-2.42-2.42
                                        a1.724 1.724 0 00-1.065-2.572c-1.757-.426-1.757-2.924
                                        0-3.35a1.724 1.724 0 001.066-2.573c-.89-1.543.877-3.31
                                        2.42-2.42.996.574 2.26.23 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </x-slot>
                <x-slot name="content">
                    <x-dropdown-link href="{{ route('profile.edit') }}">
                        {{ __('Profile') }}
                    </x-dropdown-link>
                    <x-dropdown-link href="#">
                        {{ __('Theme') }}
                    </x-dropdown-link>
                </x-slot>
            </x-dropdown>
        @endif
    </div>
</nav>
