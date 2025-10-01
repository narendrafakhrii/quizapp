<section x-show="showCompletion" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
    x-cloak class="fixed inset-0 flex items-center justify-center bg-gray-50 z-50 p-6">
    <div class="w-full max-w-3xl bg-white rounded-2xl shadow-lg p-10 text-center">
        <div class="text-7xl mb-6" x-text="'\uD83C\uDF89'"></div>
        <h2 class="text-4xl font-bold text-gray-800 mb-4">{{ __('Congratulations!') }}</h2>
        <p class="text-gray-600 mb-2 text-lg">{{ __('You have completed the material') }}</p>
        <p class="text-2xl font-semibold text-blue-600 mb-8" x-text="title"></p>

        {{-- Quiz Results --}}
        <div class="bg-gray-50 rounded-lg p-6 mb-8">
            <div class="text-base text-gray-600 mb-2">{{ __('Your Quiz Result:') }}</div>
            <div class="text-3xl font-bold text-green-600 mb-1"
                x-text="`${correctCount}/${quizCount} {{ __('Correct') }}`"></div>
            <div class="text-base text-gray-500 mb-4"
                x-text="`{{ __('Accuracy:') }} ${Math.round((correctCount/quizCount)*100)}%`">
            </div>

            {{-- Motivation --}}
            <div>
                <template x-if="(correctCount/quizCount) >= 0.8">
                    <p class="text-green-600 font-semibold"
                        x-text="`{{ __('Great! Your understanding is excellent') }} \uD83D\uDC4F`">
                    </p>
                </template>
                <template x-if="(correctCount/quizCount) >= 0.5 && (correctCount/quizCount) < 0.8">
                    <p class="text-yellow-600 font-semibold"
                        x-text="`{{ __('Not bad! There is still room for improvement') }} \uD83D\uDCAA`">
                    </p>
                </template>
                <template x-if="(correctCount/quizCount) < 0.5">
                    <p class="text-red-600 font-semibold" x-text="`{{ __('Don’t give up, try again!') }} \uD83D\uDD04`">
                    </p>
                </template>
            </div>

        </div>

        {{-- Action Buttons --}}
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('learn.index') }}"
                class="flex-1 px-6 py-4 bg-blue-500 text-white rounded-full font-medium hover:bg-blue-600 transition-colors">
                {{ __('Back to Materials List') }}
            </a>
            <button @click="restart()"
                class="flex-1 px-6 py-4 bg-gray-500 text-white rounded-full font-medium hover:bg-gray-600 transition-colors">
                {{ __('Restart Material') }}
            </button>
        </div>
    </div>
</section>
