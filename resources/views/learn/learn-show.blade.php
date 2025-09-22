<x-layout>
    <div x-data="learningApp(@json($slidesData), @json($title))" x-init="init()"
        class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">

        <div class="max-w-4xl mx-auto p-6">
            {{-- Header dengan Title --}}
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-2" x-text="title"></h1>
                <div class="flex justify-center items-center space-x-4 text-sm text-gray-600">
                    <span x-text="`Slide ${currentSlide + 1} dari ${totalSlides}`"></span>
                    <span class="px-3 py-1 rounded-full text-xs font-medium"
                          :class="currentSlideData?.slide_type === 'material' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800'"
                          x-text="currentSlideData?.slide_type === 'material' ? 'Materi' : 'Soal'">
                    </span>
                </div>
            </div>

            {{-- Progress Bar --}}
            <div class="mb-8">
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="bg-gradient-to-r from-blue-500 to-purple-600 h-3 rounded-full transition-all duration-500"
                        :style="`width: ${((currentSlide + 1) / totalSlides) * 100}%`"></div>
                </div>
                <div class="flex justify-between mt-2 text-xs text-gray-500">
                    <span>Mulai</span>
                    <span>Selesai</span>
                </div>
            </div>

            {{-- Content Card --}}
            <div class="bg-white rounded-3xl shadow-xl p-8 mb-8 min-h-[500px] flex flex-col">
                
                {{-- Material Content --}}
                <div x-show="currentSlideData?.slide_type === 'material'" class="flex-1">
                    <div class="prose max-w-none">
                        <div class="text-gray-700 leading-relaxed text-lg space-y-4">
                            <template x-if="currentSlideData?.content">
                                <div x-html="currentSlideData.content.replace(/\n/g, '<br>')"></div>
                            </template>
                        </div>
                    </div>
                </div>

                {{-- Quiz Content --}}
                <div x-show="currentSlideData?.slide_type === 'quiz'" class="flex-1 flex flex-col">
                    <template x-if="currentSlideData?.question">
                        <div class="flex-1 flex flex-col">
                            <h2 class="text-2xl font-semibold mb-8 text-gray-800 text-center" 
                                x-text="currentSlideData.question.question_text">
                            </h2>

                            <div class="space-y-4 flex-1">
                                <template x-for="(answer, index) in currentSlideData.question.answers" :key="answer.id">
                                    <div class="option-button p-6 rounded-2xl border-2 cursor-pointer transition-all duration-200 text-lg"
                                        :class="{
                                            'border-gray-200 hover:border-blue-300 hover:bg-blue-50': !answered && selectedAnswer !== answer.answer_text,
                                            'border-blue-400 bg-blue-50': !answered && selectedAnswer === answer.answer_text,
                                            'border-green-400 bg-green-50': answered && answer.is_correct,
                                            'border-red-400 bg-red-50': answered && selectedAnswer === answer.answer_text && !answer.is_correct,
                                            'border-gray-200 bg-gray-50': answered && selectedAnswer !== answer.answer_text && !answer.is_correct
                                        }"
                                        @click="selectAnswer(answer)" 
                                        x-text="answer.answer_text">
                                    </div>
                                </template>
                            </div>

                            {{-- Quiz Result --}}
                            <div x-show="answered" x-transition class="mt-8 p-6 rounded-xl text-center"
                                :class="isCorrect ? 'bg-green-100 border border-green-300' : 'bg-red-100 border border-red-300'">
                                <div class="text-4xl mb-2" x-text="isCorrect ? '🎉' : '❌'"></div>
                                <p class="text-xl font-semibold" 
                                   :class="isCorrect ? 'text-green-800' : 'text-red-800'"
                                   x-text="isCorrect ? 'Benar! Jawaban Anda tepat!' : 'Salah! Coba lagi next time!'">
                                </p>
                                <template x-if="!isCorrect && correctAnswer">
                                    <p class="text-sm text-gray-600 mt-2">
                                        Jawaban yang benar: <span class="font-semibold" x-text="correctAnswer"></span>
                                    </p>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            {{-- Navigation Buttons --}}
            <div class="flex justify-between items-center">
                <button @click="previousSlide()" 
                        :disabled="currentSlide === 0"
                        class="px-8 py-3 rounded-full font-medium transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                        :class="currentSlide === 0 ? 'bg-gray-300 text-gray-500' : 'bg-gray-500 text-white hover:bg-gray-600'">
                    ← Sebelumnya
                </button>

                <div class="flex space-x-2">
                    <template x-for="i in totalSlides" :key="i">
                        <div class="w-3 h-3 rounded-full transition-all duration-200"
                            :class="i - 1 === currentSlide ? 'bg-blue-500' : 'bg-gray-300'">
                        </div>
                    </template>
                </div>

                <button @click="nextSlide()" 
                        :disabled="currentSlideData?.slide_type === 'quiz' && !answered"
                        class="px-8 py-3 rounded-full font-medium transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                        :class="(currentSlideData?.slide_type === 'quiz' && !answered) ? 'bg-gray-300 text-gray-500' : 'bg-blue-500 text-white hover:bg-blue-600'"
                        x-text="currentSlide === totalSlides - 1 ? 'Selesai' : 'Selanjutnya →'">
                </button>
            </div>

            {{-- Completion Modal --}}
            <div x-show="showCompletion" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-3xl p-8 max-w-md mx-4 text-center">
                    <div class="text-6xl mb-4">🎉</div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Selamat!</h2>
                    <p class="text-gray-600 mb-2">Anda telah menyelesaikan materi</p>
                    <p class="text-xl font-semibold text-blue-600 mb-6" x-text="title"></p>
                    
                    <div class="bg-gray-50 rounded-lg p-4 mb-6">
                        <div class="text-sm text-gray-600 mb-2">Hasil Quiz Anda:</div>
                        <div class="text-2xl font-bold text-green-600" x-text="`${correctCount}/${quizCount} Benar`"></div>
                        <div class="text-sm text-gray-500" x-text="`Akurasi: ${Math.round((correctCount/quizCount)*100)}%`"></div>
                    </div>

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
        function learningApp(slidesData, materialTitle) {
            return {
                title: materialTitle,
                slides: slidesData,
                currentSlide: 0,
                totalSlides: slidesData.length,

                // Quiz state
                selectedAnswer: null,
                answered: false,
                isCorrect: false,
                correctAnswer: null,
                showCompletion: false,

                // Statistics
                correctCount: 0,
                quizCount: 0,

                init() {
                    console.log('Learning app initialized');
                    console.log('Total slides:', this.totalSlides);
                    console.log('Slides data:', this.slides);
                    
                    // Hitung total quiz
                    this.quizCount = this.slides.filter(slide => slide.slide_type === 'quiz').length;
                },

                get currentSlideData() {
                    return this.slides[this.currentSlide] || null;
                },

                selectAnswer(answer) {
                    if (this.answered) return;

                    this.selectedAnswer = answer.answer_text;
                    this.answered = true;
                    this.isCorrect = answer.is_correct;
                    
                    // Cari jawaban yang benar untuk ditampilkan jika salah
                    if (!this.isCorrect) {
                        const correctAnswerObj = this.currentSlideData.question.answers.find(a => a.is_correct);
                        this.correctAnswer = correctAnswerObj ? correctAnswerObj.answer_text : null;
                    }
                    
                    // Update statistik
                    if (this.isCorrect) {
                        this.correctCount++;
                    }
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
                    this.selectedAnswer = null;
                    this.answered = false;
                    this.isCorrect = false;
                    this.correctAnswer = null;
                },

                restart() {
                    this.currentSlide = 0;
                    this.resetQuizState();
                    this.showCompletion = false;
                    this.correctCount = 0;
                }
            }
        }
    </script>
</x-layout>