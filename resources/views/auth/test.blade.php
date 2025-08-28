<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center bg-gray-50">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
            
            <!-- Heading -->
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Welcome back !</h2>
            <p class="text-sm text-gray-500 mb-6">Enter to get unlimited access to data & information.</p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        placeholder="Enter your mail address">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Password <span class="text-red-500">*</span>
                    </label>
                    <input id="password" type="password" name="password" required
                        class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        placeholder="Enter password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember + Forgot -->
                <div class="flex items-center justify-between mb-6">
                    <label for="remember_me" class="flex items-center text-sm">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <span class="ml-2 text-gray-600">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">
                            Forgot your password ?
                        </a>  
                    @endif
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-700 transition">
                    Log In
                </button>

                <!-- Divider -->
                <div class="flex items-center my-6">
                    <div class="flex-grow border-t border-gray-300"></div>
                    <span class="mx-2 text-gray-400 text-sm">Or, Login with</span>
                    <div class="flex-grow border-t border-gray-300"></div>
                </div>

                <!-- Google Login -->
                <a href="{{ route('auth.google') }}"
                    class="flex items-center justify-center gap-2 w-full py-2 px-4 border rounded-lg shadow hover:bg-gray-50 transition">
                    <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google" class="w-5 h-5">
                    <span class="text-gray-700 font-medium">Sign up with Google</span>
                </a>
            </form>

            <!-- Register link -->
            <p class="mt-6 text-center text-sm text-gray-600">
                Don’t have an account ?
                <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:underline">
                    Register here
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>