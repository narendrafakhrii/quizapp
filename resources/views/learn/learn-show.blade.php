<x-layout>
    <div x-data="learningApp(@json($learn->questions), @json($learn->content), @json($learn->title))" x-init="init()"
        class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 p-4">

        <div class="max-w-2xl mx-auto">
            {{-- Title --}}
            <div class="text-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800" x-text="title"></h1>
            </div>

            {{-- Progress Bar --}}
            <div class="mb-6">
                <div class="flex justify-between text-sm text-gray-600 mb-2">
                    <span x-text="`${currentSlide + 1}/${totalSlides}`"></span>
                    <span x-text="isQuizMode ? 'Quiz' : 'Materi'"></span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-green-500 h-2 rounded-full transition-all duration-300"
                        :style="`width: ${((currentSlide + 1) / totalSlides) * 100}%`"></div>
                </div>
            </div>

            {{-- Content Card --}}
            <div class="bg-white rounded-3xl shadow-lg p-8 mb-6 min-h-[400px] flex flex-col">

                {{-- Material Content --}}
                <div x-show="!isQuizMode" class="flex-1">
                    <div class="prose max-w-none">
                        <div x-html="materialContent" class="text-gray-700 leading-relaxed"></div>
                    </div>
                </div>

                {{-- Quiz Content --}}
                <div x-show="isQuizMode" class="flex-1 flex flex-col">
                    <template x-if="currentQuestion">
                        <div class="flex-1 flex flex-col">
                            <h2 class="text-xl font-semibold mb-6 text-gray-800" x-text="currentQuestion.question_text">
                            </h2>

                            <div class="space-y-3 flex-1">
                                <template x-for="option in currentQuestion.options" :key="option.answer_text">
                                    <div class="option-button p-4 rounded-2xl border-2 cursor-pointer transition-all duration-200"
                                        :class="{
                                            'border-gray-200 hover:border-blue-300 hover:bg-blue-50': !answered &&
                                                selectedOption !== option.answer_text,
                                            'border-blue-400 bg-blue-50': !answered && selectedOption === option
                                                .answer_text,
                                            'border-green-400 bg-green-50': answered && option.is_correct,
                                            'border-red-400 bg-red-50': answered && selectedOption === option
                                                .answer_text && !option.is_correct,
                                            'border-gray-200 bg-gray-50': answered && selectedOption !== option
                                                .answer_text && !option.is_correct
                                        }"
                                        @click="selectOption(option)" x-text="option.answer_text">
                                    </div>
                                </template>
                            </div>

                            {{-- Quiz Result --}}
                            <div x-show="answered" x-transition class="mt-6 p-4 rounded-xl"
                                :class="isCorrect ? 'bg-green-100 border border-green-300' : 'bg-red-100 border border-red-300'">
                                <p class="font-semibold" :class="isCorrect ? 'text-green-800' : 'text-red-800'"
                                    x-text="isCorrect ? '✓ Benar!' : '✗ Salah!'">
                                </p>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            {{-- Navigation Buttons --}}
            <div class="flex justify-between items-center">
                <button @click="previousSlide()" :disabled="currentSlide === 0"
                    class="px-6 py-3 rounded-full bg-gray-500 text-white font-medium transition-all duration-200 hover:bg-gray-600 disabled:bg-gray-300 disabled:cursor-not-allowed">
                    Sebelumnya
                </button>

                <div class="flex space-x-2">
                    <template x-for="i in totalSlides" :key="i">
                        <div class="w-2 h-2 rounded-full transition-all duration-200"
                            :class="i - 1 === currentSlide ? 'bg-blue-500' : 'bg-gray-300'">
                        </div>
                    </template>
                </div>

                <button @click="nextSlide()" :disabled="isQuizMode && !answered"
                    class="px-6 py-3 rounded-full bg-blue-500 text-white font-medium transition-all duration-200 hover:bg-blue-600 disabled:bg-gray-300 disabled:cursor-not-allowed"
                    x-text="currentSlide === totalSlides - 1 ? 'Selesai' : 'Selanjutnya'">
                </button>
            </div>

            {{-- Completion Modal --}}
            <div x-show="showCompletion" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-3xl p-8 max-w-md mx-4 text-center">
                    <div class="text-6xl mb-4">🎉</div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Selamat!</h2>
                    <p class="text-gray-600 mb-2">Kamu telah menyelesaikan materi</p>
                    <p class="text-xl font-semibold text-blue-600 mb-6" x-text="title"></p>

                    <div class="space-y-3">
                        <a href="{{ route('learn.index') }}"
                            class="block w-full px-6 py-3 bg-blue-500 text-white rounded-full font-medium hover:bg-blue-600 transition-colors">
                            Kembali ke Daftar Materi
                        </a>
                        <button @click="restart()"
                            class="block w-full px-6 py-3 bg-gray-500 text-white rounded-full font-medium hover:bg-gray-600 transition-colors">
                            Ulangi Materi
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function learningApp(questionsData, materialContent, materialTitle) {
            return {
                title: materialTitle,
                materialContent: materialContent ? materialContent.replace(/\n/g, '<br>') : '',
                questions: questionsData,

                // Slide management
                currentSlide: 0,
                totalSlides: (materialContent ? 1 : 0) + questionsData.length,

                // Quiz state
                selectedOption: null,
                answered: false,
                isCorrect: false,
                showCompletion: false,

                init() {
                    console.log('Total slides:', this.totalSlides);
                    console.log('Has material:', !!this.materialContent);
                    console.log('Questions count:', this.questions.length);
                },

                get isQuizMode() {
                    if (!this.materialContent) {
                        return true; // Jika tidak ada materi, langsung quiz
                    }
                    return this.currentSlide > 0; // Slide pertama adalah materi
                },

                get currentQuestion() {
                    if (!this.isQuizMode) return null;
                    const questionIndex = this.materialContent ? this.currentSlide - 1 : this.currentSlide;
                    return this.questions[questionIndex] || null;
                },

                selectOption(option) {
                    if (this.answered) return;

                    this.selectedOption = option.answer_text;
                    this.answered = true;
                    this.isCorrect = option.is_correct;
                },

                nextSlide() {
                    if (this.currentSlide < this.totalSlides - 1) {
                        this.currentSlide++;
                        this.resetQuizState();
                    } else {
                        this.showCompletion = true;
                    }
                },

                previousSlide() {
                    if (this.currentSlide > 0) {
                        this.currentSlide--;
                        this.resetQuizState();
                    }
                },

                resetQuizState() {
                    this.selectedOption = null;
                    this.answered = false;
                    this.isCorrect = false;
                },

                restart() {
                    this.currentSlide = 0;
                    this.resetQuizState();
                    this.showCompletion = false;
                }
            }
        }
    </script>
</x-layout>
