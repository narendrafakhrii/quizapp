<section x-show="showCompletion" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
    x-cloak class="fixed inset-0 flex items-center justify-center bg-gray-50 z-50 p-6">
    <div class="w-full max-w-3xl bg-white rounded-2xl shadow-lg p-10 text-center">
        <div class="text-7xl mb-6">🎉</div>
        <h2 class="text-4xl font-bold text-gray-800 mb-4">{{ __('Congratulations!') }}</h2>
        <p class="text-gray-600 mb-2 text-lg">Anda telah menyelesaikan materi</p>
        <p class="text-2xl font-semibold text-blue-600 mb-8" x-text="title"></p>

        {{-- Hasil Quiz --}}
        <div class="bg-gray-50 rounded-lg p-6 mb-8">
            <div class="text-base text-gray-600 mb-2">Hasil Quiz Anda:</div>
            <div class="text-3xl font-bold text-green-600 mb-1" x-text="`${correctCount}/${quizCount} Benar`"></div>
            <div class="text-base text-gray-500 mb-4" x-text="`Akurasi: ${Math.round((correctCount/quizCount)*100)}%`">
            </div>

            {{-- Motivasi --}}
            <div>
                <template x-if="(correctCount/quizCount) >= 0.8">
                    <p class="text-green-600 font-semibold">Hebat! Pemahamanmu sangat baik 👏</p>
                </template>
                <template x-if="(correctCount/quizCount) >= 0.5 && (correctCount/quizCount) < 0.8">
                    <p class="text-yellow-600 font-semibold">Lumayan! Masih ada ruang untuk ditingkatkan 💪</p>
                </template>
                <template x-if="(correctCount/quizCount) < 0.5">
                    <p class="text-red-600 font-semibold">Jangan menyerah, coba lagi ya 🔄</p>
                </template>
            </div>
        </div>

        {{-- Tombol Aksi --}}
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('learn.index') }}"
                class="flex-1 px-6 py-4 bg-blue-500 text-white rounded-full font-medium hover:bg-blue-600 transition-colors">
                Kembali ke Daftar Materi
            </a>
            <button @click="restart()"
                class="flex-1 px-6 py-4 bg-gray-500 text-white rounded-full font-medium hover:bg-gray-600 transition-colors">
                Ulangi Materi
            </button>
        </div>
    </div>
</section>
