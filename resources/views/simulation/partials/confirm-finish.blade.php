{{-- Partial: Confirm Finish --}}
<section x-show="showConfirmFinish" x-cloak
    class="flex items-center justify-center min-h-screen bg-gray-50 p-6 fixed inset-0 z-50">
    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-lg p-8 border">
        <h2 class="text-2xl font-bold mb-4">{{ __('Finish Confirmation') }}</h2>
        <p class="text-gray-600 mb-6">
            {{ __('Are you sure you want to finish this simulation?') }}
        </p>

        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="p-4 rounded-lg bg-gray-50 border text-center">
                <p class="text-xs text-gray-500">{{ __('Answered') }}</p>
                <p class="text-lg font-semibold" x-text="answeredCount + ' / ' + questions.length"></p>
            </div>
            <div class="p-4 rounded-lg bg-gray-50 border text-center">
                <p class="text-xs text-gray-500">{{ __('Time Left') }}</p>
                <p class="text-lg font-semibold" x-text="timeLeftFormatted"></p>
            </div>
        </div>

        <div class="mb-6">
            <h4 class="font-semibold mb-2">{{ __('Notes') }}</h4>
            <ul class="list-disc pl-5 text-sm text-gray-700 space-y-1">
                <li>{{ __('Answers cannot be changed after the simulation is finished.') }}</li>
                <li>{{ __('Unanswered questions will be considered empty.') }}</li>
                <li>{{ __('Make sure all your answers are correct.') }}</li>
            </ul>
        </div>

        <div class="flex justify-end gap-3">
            <button @click="showConfirmFinish = false"
                class="px-4 py-2 rounded-lg border text-gray-700 hover:bg-gray-50">
                {{ __('Back') }}
            </button>
            <button @click="finishSimulation()"
                class="px-4 py-2 rounded-lg bg-red-600 text-white font-semibold hover:bg-red-700">
                {{ __('Yes, Finish') }}
            </button>
        </div>
    </div>
</section>
