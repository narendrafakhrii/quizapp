<x-layout>
    <div x-data="quiz(@json($learn->questions))" x-init="init()" class="max-w-3xl mx-auto p-6 space-y-8">

        {{-- Header Materi --}}
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $learn->title }}</h1>
        </div>

        {{-- Materi --}}
        <div class="bg-white p-6 rounded-2xl shadow-md mb-6">
            <div class="prose max-w-none text-gray-700">
                {!! nl2br(e($learn->content)) !!}
            </div>
        </div>

        {{-- Progress bar --}}
        <div class="w-full text-center mb-4" x-cloak x-show="!quizFinished && total > 0">
            <div class="mx-auto w-3/4 bg-gray-300 rounded-full h-4 overflow-hidden">
                <div class="bg-green-500 h-4 rounded-full transition-all duration-300"
                    :style="`width: ${Math.min(currentIndex+1, total)/total*100}%`"></div>
            </div>
            <p class="text-sm text-gray-700 mt-1">
                Soal <span x-text="Math.min(currentIndex + 1, total)"></span> / <span x-text="total"></span>
            </p>
        </div>

        {{-- Soal --}}
        <template x-for="(question, index) in questions" :key="index">
            <div x-show="currentIndex === index && !quizFinished" class="bg-white p-6 rounded-2xl shadow-md space-y-6">
                <h2 class="text-xl font-bold" x-text="question.question_text"></h2>
                <div class="space-y-3">
                    <template x-for="option in question.options" :key="option.answer_text">
                        <div class="option-div flex items-center gap-3 p-3 rounded-xl border cursor-pointer hover:bg-gray-50"
                            x-text="option.answer_text"
                            :class="{
                                'bg-green-200 border-green-500': answered[index] && option.is_correct,
                                'bg-red-200 border-red-500': answered[index] && selected[index] === option
                                    .answer_text && !option.is_correct
                            }"
                            @click="selectOption(index, option)">
                        </div>
                    </template>
                </div>
            </div>
        </template>

        {{-- Navigasi --}}
        <div class="flex justify-between mt-4" x-cloak x-show="!quizFinished && total > 0">
            <button class="px-4 py-2 rounded-xl bg-gray-300 hover:bg-gray-400" @click="prev()"
                :disabled="currentIndex === 0">Sebelumnya</button>
            <button class="px-4 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700" @click="next()"
                :disabled="!answered[currentIndex]">Selanjutnya</button>
        </div>

        {{-- Hasil Quiz --}}
        <div x-show="quizFinished" x-cloak class="text-center space-y-6 mt-6">
            <h2 class="text-2xl font-bold text-green-600">Selamat!</h2>
            <p class="text-lg">Kamu sudah menyelesaikan kuis materi ini!</p>
            <p class="text-xl font-semibold">Skor kamu:
                <span x-text="score"></span> / <span x-text="total"></span>
            </p>
            <div class="text-3xl mt-4" x-text="badge"></div>
            <div class="flex gap-4 justify-center">
                <button @click="restart()" class="px-6 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700">
                    Coba Lagi
                </button>
                <a href="{{ route('learn.index') }}"
                    class="px-6 py-2 rounded-xl bg-gray-600 text-white hover:bg-gray-700">
                    Kembali ke Materi
                </a>
            </div>
        </div>
    </div>

    <script>
        function quiz(questionsData) {
            return {
                questions: questionsData,
                total: questionsData.length,
                currentIndex: 0,
                answered: Array(questionsData.length).fill(false),
                selected: Array(questionsData.length).fill(null),
                score: 0,
                quizFinished: false,
                badge: '',

                init() {},

                selectOption(index, option) {
                    if (this.answered[index]) return;
                    this.answered[index] = true;
                    this.selected[index] = option.answer_text;
                    if (option.is_correct) this.score++;
                },

                next() {
                    if (this.currentIndex < this.total - 1) {
                        this.currentIndex++;
                    } else {
                        this.finishQuiz();
                    }
                },

                prev() {
                    if (this.currentIndex > 0) {
                        this.currentIndex--;
                    }
                },

                finishQuiz() {
                    this.quizFinished = true;
                    if (this.score === this.total) this.badge = "Master Quiz!";
                    else if (this.score >= this.total * 0.7) this.badge = "Hebat! Hampir sempurna!";
                    else if (this.score >= this.total * 0.5) this.badge = "Bagus! Terus berlatih!";
                    else this.badge = "Jangan menyerah, coba lagi!";
                },

                restart() {
                    this.currentIndex = 0;
                    this.answered.fill(false);
                    this.selected.fill(null);
                    this.score = 0;
                    this.quizFinished = false;
                },
            };
        }
    </script>
</x-layout>
