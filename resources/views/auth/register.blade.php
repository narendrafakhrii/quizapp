<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Heading -->
        <!-- Heading -->
        <div class="w-full flex items-center justify-center bg-transparent mb-3">
            <h2 class="text-3xl font-bold text-gray-600">Register</h2>
        </div>


        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4" x-data="{ show: false }">
            <x-input-label for="password" :value="__('Password')" />

            <div class="relative">
                <!-- Input password -->
                <input id="password"
                    class="block mt-1 w-full pr-10 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    :type="show ? 'text' : 'password'" name="password" required autocomplete="current-password" />

                <button type="button" @click="show = !show" :aria-label="show ? 'Hide password' : 'Show password'"
                    x-bind:title="show ? 'Hide password' : 'Show password'"
                    class="absolute inset-y-0 right-2    flex items-center p-1">
                    <!-- Eye (visible) -->
                    <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" x-cloak>
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.458 12C3.732 8.943 6.523 6.5 10 6.5c3.478 0 6.268 2.444 7.542 5.5-1.274 3.057-4.064 5.5-7.542 5.5-3.477 0-6.268-2.443-7.542-5.5z" />
                        <circle cx="10" cy="12" r="2" />
                    </svg>

                    <!-- Eye Off (hidden) -->
                    <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" x-cloak>
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.94 17.94A10.94 10.94 0 0 1 12 19.5c-3.478 0-6.268-2.443-7.542-5.5.727-1.747 1.95-3.226 3.5-4.243" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.88 9.88A2 2 0 0 0 12 12c.35 0 .68-.08.98-.22" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4" x-data="{ showConfirm: false }">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <div class="relative">
                <!-- Input password confirmation -->
                <input id="password_confirmation"
                    class="block mt-1 w-full pr-10 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    :type="showConfirm ? 'text' : 'password'" name="password_confirmation" required
                    autocomplete="new-password" />

                <!-- Tombol mata -->
                <button type="button" @click="showConfirm = !showConfirm"
                    :aria-label="showConfirm ? 'Hide password' : 'Show password'"
                    x-bind:title="showConfirm ? 'Hide password' : 'Show password'"
                    class="absolute inset-y-0 right-2 flex items-center p-1">

                    <!-- Eye (visible) -->
                    <svg x-show="!showConfirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" x-cloak>
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.458 12C3.732 8.943 6.523 6.5 10 6.5c3.478 0 6.268 2.444 7.542 5.5-1.274 3.057-4.064 5.5-7.542 5.5-3.477 0-6.268-2.443-7.542-5.5z" />
                        <circle cx="10" cy="12" r="2" />
                    </svg>

                    <!-- Eye Off (hidden) -->
                    <svg x-show="showConfirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" x-cloak>
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.94 17.94A10.94 10.94 0 0 1 12 19.5c-3.478 0-6.268-2.443-7.542-5.5.727-1.747 1.95-3.226 3.5-4.243" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.88 9.88A2 2 0 0 0 12 12c.35 0 .68-.08.98-.22" />
                    </svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


        <div class="relative my-6 mt-6 mb-6">
            <x-button.primary-button class="w-full py-2 px-2 justify-center">
                {{ __('Register') }}
            </x-button.primary-button>
        </div>

        <div class="flex items-center justify-between mt-4">
            <a href="{{ route('auth.google') }}"
                class="flex items-center justify-center gap-3 w-full py-2 px-4 border rounded-lg shadow hover:bg-gray-50 transition">
                <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google" class="w-5 h-5">
                <span class="text-gray-700 font-medium">{{ __('Continue with Google') }}</span>
            </a>
        </div>

        <div class="flex items-center justify-center mt-2">
            <a class="mt-4 text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
                <a class="mt-4 ms-1 font-semibold text-sm text-indigo-600 hover:text-indigo-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Login') }}
                </a>
            </a>
        </div>

    </form>
</x-guest-layout>
