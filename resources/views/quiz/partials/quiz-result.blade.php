<section class="flex items-center justify-center min-h-screen bg-gray-50 p-6">
    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-lg p-8 border">
        <div x-show="quizFinished" x-cloak class="text-center space-y-6 mt-6">
            <h2 class="text-2xl font-bold text-green-600">{{ __('Congratulations!') }}</h2>
            <p class="text-lg">{{ __('You have completed this quiz.') }}</p>
            <p class="text-xl font-semibold">
                {{ __('Your score:') }} <span x-text="score"></span> / <span x-text="total"></span>
            </p>
            <div class="text-3xl mt-4" x-text="badge"></div>
            <button @click="restart()" class="px-6 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700">
                {{ __('Try Again') }}
            </button>
        </div>
    </div>
</section>
