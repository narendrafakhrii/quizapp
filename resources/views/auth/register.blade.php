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
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

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
                <span class="text-gray-700 font-medium">Continue with Google</span>
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
