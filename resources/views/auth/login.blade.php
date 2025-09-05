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
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me + Forgot Password-->
        <div class="flex items-center justify-between mb-6 mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600 p-2">{{ __('Remember me') }}</span>
            </label>

<<<<<<< HEAD
        <div class="flex items-center justify-end mt-4">
=======
>>>>>>> b49f9c21450b5bef8add2d293bbd3988c2b1c152
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="w-full py-2 px-4 justify-center">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <!-- Divider -->
        <div class="relative my-6 mt-6 mb-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="bg-white px-3 text-sm text-gray-500">Or</span>
            </div>
        </div>

        <!-- Login with Google -->
        <div class="flex items-center justify-between mt-4">
            <a href="{{ route('auth.google') }}"
                class="flex items-center justify-center gap-3 w-full py-2 px-4 border rounded-lg shadow hover:bg-gray-50 transition">
                <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google" class="w-5 h-5">
                <span class="text-gray-700 font-medium">Login with Google</span>
            </a>
        </div>

        <div class="flex items-center justify-center mt-2">
            <p class="mt-4 text-center text-sm text-gray-600">
                Don't have an account?
                <a href="{{ route('register') }}"
                    class="text-indigo-600 hover:text-indigo-900 font-semibold">Register</a>
            </p>
        </div>
    </form>
</x-guest-layout>
