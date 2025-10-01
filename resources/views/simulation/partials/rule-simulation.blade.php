<section class="flex items-center justify-center min-h-screen bg-gray-50 p-6">
    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-lg p-8 border">
        <h2 class="text-2xl font-bold mb-4">{{ __('UTBK Simulation') }}</h2>
        <p class="text-gray-600 mb-6">
            {{ __('Before starting, please note the following information:') }}
        </p>

        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="p-4 rounded-lg bg-gray-50 border text-center">
                <p class="text-xs text-gray-500">{{ __('Time Limit') }}</p>
                <p class="text-lg font-semibold">45 {{ __('minutes') }}</p>
            </div>
            <div class="p-4 rounded-lg bg-gray-50 border text-center">
                <p class="text-xs text-gray-500">{{ __('Number of Questions') }}</p>
                <p class="text-lg font-semibold">{{ count($questionsJson) }}</p>
            </div>
        </div>

        <div class="mb-6">
            <h4 class="font-semibold mb-2">{{ __('Rules') }}</h4>
            <ul class="list-disc pl-5 text-sm text-gray-700 space-y-1">
                <li>{{ __('Answers cannot be changed after time is up.') }}</li>
                <li>{{ __('Leaving the simulation page is prohibited.') }}</li>
                <li>{{ __('Ensure your internet connection is stable.') }}</li>
            </ul>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('practice') }}" class="px-4 py-2 rounded-lg border text-gray-700 hover:bg-gray-50">
                {{ __('Cancel') }}
            </a>
            <x-button.primary-button @click="showMainContent = true; $dispatch('start-simulation');"
                class="px-4 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700">
                {{ __('START SIMULATION') }}
            </x-button.primary-button>
        </div>
    </div>
</section>
