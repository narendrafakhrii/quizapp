{{-- Result Simulation --}}
<section x-show="showResult" x-cloak
    class="flex items-center justify-center min-h-screen bg-gray-50 p-4 fixed inset-0 z-50 overflow-y-auto">
    <div class="w-full max-w-6xl bg-white rounded-2xl shadow-lg p-6 border my-5">
        <div class="text-center mb-6 mt-6">
            <h2 class="text-2xl font-bold mb-2">{{ __('UTBK Simulation Results') }}</h2>
            <p class="text-gray-600">{{ __('The simulation is complete. Here are your results:') }}</p>
        </div>

        <!-- Grid Layout: Score & Statistics -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- Score Display -->
            <div class="text-center bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-2xl p-6">
                <p class="text-sm opacity-90 mb-1">{{ __('Your Score') }}</p>
                <p class="text-4xl font-bold" x-text="finalScore"></p>
                <p class="text-sm opacity-90"
                    x-text="'{{ __('out of') }} ' + questions.length * 4 + ' {{ __('maximum points') }}'"></p>
            </div>

            <!-- Statistics Grid -->
            <div class="grid grid-cols-2 gap-3">
                <div class="p-3 rounded-lg bg-green-50 border border-green-200 text-center">
                    <p class="text-xs text-green-600 mb-1">{{ __('Correct') }}</p>
                    <p class="text-lg font-semibold text-green-700" x-text="correctAnswers"></p>
                </div>
                <div class="p-3 rounded-lg bg-red-50 border border-red-200 text-center">
                    <p class="text-xs text-red-600 mb-1">{{ __('Wrong') }}</p>
                    <p class="text-lg font-semibold text-red-700" x-text="wrongAnswers"></p>
                </div>
                <div class="p-3 rounded-lg bg-gray-50 border border-gray-200 text-center">
                    <p class="text-xs text-gray-600 mb-1">{{ __('Unanswered') }}</p>
                    <p class="text-lg font-semibold text-gray-700" x-text="unansweredCount"></p>
                </div>
                <div class="p-3 rounded-lg bg-yellow-50 border border-yellow-200 text-center">
                    <p class="text-xs text-yellow-600 mb-1">{{ __('Doubtful') }}</p>
                    <p class="text-lg font-semibold text-yellow-700" x-text="doubtfulCount"></p>
                </div>
            </div>
        </div>

        <!-- Two Column Layout: Analysis & Time -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- Performance Analysis -->
            <div>
                <h4 class="font-semibold mb-3">{{ __('Performance Analysis') }}</h4>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm text-gray-600">{{ __('Accuracy Percentage') }}</span>
                        <span class="font-semibold" x-text="accuracyPercentage + '%'"></span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div class="bg-gradient-to-r from-green-400 to-green-600 h-3 rounded-full transition-all duration-1000"
                            :style="'width: ' + accuracyPercentage + '%'"></div>
                    </div>
                </div>
            </div>

            <!-- Time Information -->
            <div>
                <h4 class="font-semibold mb-3">{{ __('Time Information') }}</h4>
                <div class="grid grid-cols-1 gap-3">
                    <div class="p-3 rounded-lg bg-blue-50 border border-blue-200">
                        <p class="text-xs text-blue-600 mb-1">{{ __('Time Used') }}</p>
                        <p class="text-sm font-semibold text-blue-700" x-text="timeUsedFormatted"></p>
                    </div>
                    <div class="p-3 rounded-lg bg-indigo-50 border border-indigo-200">
                        <p class="text-xs text-indigo-600 mb-1">{{ __('Average per Question') }}</p>
                        <p class="text-sm font-semibold text-indigo-700"
                            x-text="averageTimePerQuestion + ' {{ __('seconds') }}'"></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Message -->
        <div class="mb-6">
            <div class="p-4 rounded-lg border-l-4"
                :class="performanceLevel.bgClass + ' ' + performanceLevel.borderClass">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-2xl" x-text="performanceLevel.icon"></span>
                    </div>
                    <div class="ml-3">
                        <p class="font-semibold" :class="performanceLevel.textClass" x-text="performanceLevel.title">
                        </p>
                        <p class="text-sm" :class="performanceLevel.descClass" x-text="performanceLevel.message"></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row justify-center gap-3">
            <a href="{{ route('simulation.show') }}"
                class="px-6 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 text-center transition-colors">
                {{ __('Repeat Simulation') }}
            </a>
            <a href="{{ route('practice') }}"
                class="px-6 py-2 rounded-lg border text-gray-700 hover:bg-gray-50 text-center transition-colors">
                {{ __('Exit') }}
            </a>
        </div>
    </div>
</section>
