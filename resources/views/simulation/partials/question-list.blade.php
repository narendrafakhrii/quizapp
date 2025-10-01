{{-- Partial: Question List Modal --}}
<section x-show="showQuestionList" x-cloak x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90" @keydown.escape.window="showQuestionList = false"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 px-4">

    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg max-h-[80vh] flex flex-col relative">

        <!-- Tombol Close -->
        <button @click="showQuestionList = false"
            class="absolute top-3 right-3 text-gray-600 hover:text-black text-lg z-10">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
        </button>

        <div class="p-6 flex flex-col gap-4 h-full">
            <h2 class="text-xl font-semibold mb-2">{{ __('Question List') }}</h2>

            <!-- Grid nomor soal -->
            <div class="grid grid-cols-6 gap-3 overflow-y-auto flex-1">
                <template x-for="(question, index) in questions" :key="index">
                    <button
                        class="w-12 h-12 flex items-center justify-center rounded-lg border font-semibold transition-colors duration-200"
                        :class="{
                            'bg-indigo-500 text-white': index === currentIndex,
                            'bg-yellow-400 text-white': question.doubtful && index !== currentIndex,
                            'border-gray-300': index !== currentIndex && !question.doubtful
                        }"
                        @click="currentIndex = index; showQuestionList = false" x-text="index + 1">
                    </button>
                </template>
            </div>
        </div>
    </div>
</section>
