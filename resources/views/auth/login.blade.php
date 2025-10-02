<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Heading -->
    <div class="w-full flex items-center justify-center bg-transparent mb-4 mt-2">
        <h2 class="text-4xl font-bold text-gray-600 mb-4">Login</h2>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
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

        <!-- Remember Me + Forgot Password -->
        <div class="flex items-center justify-between mt-4 mb-6">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600 p-2">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end mt-4">
            <x-button.primary-button class="w-full py-2 px-4 justify-center">
                {{ __('Log in') }}
            </x-button.primary-button>
        </div>

        <!-- Divider -->
        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="bg-white px-3 text-sm text-gray-500">Or</span>
            </div>
        </div>

        <!-- Login with Google -->
        <div class="flex items-center justify-center mt-4">
            <a href="{{ route('auth.google') }}"
                class="flex items-center justify-center gap-3 w-full py-2 px-4 border rounded-lg shadow hover:bg-gray-50 transition">
                <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google" class="w-5 h-5">
                <span class="text-gray-700 font-medium">Login with Google</span>
            </a>
        </div>

        <!-- Register Link -->
        <div class="flex items-center justify-center mt-4">
            <p class="text-sm text-gray-600">
                Don't have an account?
                <a href="{{ route('register') }}"
                    class="text-indigo-600 hover:text-indigo-900 font-semibold">Register</a>
            </p>
        </div>

    </form>
</x-guest-layout>
