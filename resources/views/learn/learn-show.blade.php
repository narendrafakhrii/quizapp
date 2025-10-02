<x-layout>
    <div x-data="learningApp({{ Js::from($slidesData) }}, {{ Js::from($title) }}, {{ Js::from($group) }})" x-init="init()" class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">

        <div class="max-w-4xl mx-auto p-6">
            {{-- Header --}}
            <div class="text-center mb-4">
                <h1 class="text-4xl font-bold text-gray-800 mb-2" x-text="title"></h1>
                <div class="flex justify-center items-center space-x-4 text-sm text-gray-600">
                    <span x-text="`Slide ${currentSlide + 1} dari ${totalSlides}`"></span>
                    <span class="px-3 py-1 rounded-full text-xs font-medium"
                        :class="currentSlideData?.slide_type === 'material' ? 'bg-green-100 text-green-800' :
                            'bg-blue-100 text-blue-800'"
                        x-text="currentSlideData?.slide_type === 'material' ? 'Material' : 'Quiz'">
                    </span>

                </div>
            </div>

            {{-- Progress Bar --}}
            <div class="mb-6">
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="bg-gradient-to-r from-blue-500 to-purple-600 h-3 rounded-full transition-all duration-500"
                        :style="`width: ${((currentSlide + 1) / totalSlides) * 100}%`"></div>
                </div>
            </div>

            {{-- Content Card --}}
            <div class="bg-white rounded-3xl shadow-xl p-8 mb-8 min-h-[400px] flex flex-col">

                {{-- Materi --}}
                <div x-show="currentSlideData?.slide_type === 'material'" class="flex-1">
                    <div class="prose max-w-none text-gray-700 leading-relaxed text-lg space-y-4">
                        <div x-html="currentSlideData.content.replace(/\n/g, '<br>')"></div>
                    </div>
                </div>

                {{-- Quiz --}}
                <div x-show="currentSlideData?.slide_type === 'quiz'" class="flex-1 flex flex-col">
                    <h2 class="text-2xl font-semibold mb-8 text-gray-800 text-center"
                        x-text="currentSlideData.question.question_text">
                    </h2>

                    <div class="space-y-4 flex-1">
                        <template x-for="answer in currentSlideData.question?.answers || []" :key="answer.id">
                            <div class="option-button p-3 rounded-lg border cursor-pointer transition-all duration-200 text-sm"
                                :class="{
                                    'border-gray-200 hover:border-blue-300 hover:bg-blue-50': !answered &&
                                        selectedAnswer !== answer.answer_text,
                                    'border-blue-400 bg-blue-50': !answered && selectedAnswer === answer.answer_text,
                                    'border-green-400 bg-green-50': answered && answer.is_correct,
                                    'border-red-400 bg-red-50': answered && selectedAnswer === answer.answer_text && !
                                        answer.is_correct,
                                    'border-gray-200 bg-gray-50': answered && selectedAnswer !== answer.answer_text && !
                                        answer.is_correct
                                }"
                                @click="selectAnswer(answer)" x-text="answer.answer_text">
                            </div>
                        </template>

                    </div>

                    {{-- Quiz Result --}}
                    <div x-show="answered" x-transition class="mt-4 p-3 rounded-xl text-center" x-cloak
                        :class="isCorrect ? 'bg-green-100 border border-green-300' : 'bg-red-100 border border-red-300'">
                        <div class="text-3md mb-2" x-text="isCorrect ? '🎉' : '❌'"></div>
                        <p class="text-sm font-semibold" :class="isCorrect ? 'text-green-800' : 'text-red-800'"
                            x-text="isCorrect ? 'Correct! Well done!' : 'Wrong! Try again next time!'">
                        </p>
                        <p x-show="!isCorrect && correctAnswer" class="text-sm text-gray-600 mt-2">
                            {{ __('The correct answer:') }} <span class="font-semibold" x-text="correctAnswer"></span>
                        </p>
                    </div>

                </div>
            </div>

            {{-- Navigation Buttons --}}
            <div class="flex justify-between items-center">
                <button @click="previousSlide()" :disabled="currentSlide === 0"
                    class="px-8 py-3 rounded-full font-medium transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                    :class="currentSlide === 0 ? 'bg-gray-300 text-gray-500' : 'bg-gray-500 text-white hover:bg-gray-600'">
                    {{ __('← Previous') }}
                </button>

                <button @click="nextSlide()" :disabled="currentSlideData?.slide_type === 'quiz' && !answered"
                    class="px-8 py-3 rounded-full font-medium transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                    :class="(currentSlideData?.slide_type === 'quiz' && !answered) ? 'bg-gray-300 text-gray-500' :
                    'bg-blue-500 text-white hover:bg-blue-600'"
                    x-text="currentSlide === totalSlides - 1 ? 'Finish' : 'Next →'">
                </button>

            </div>

            {{-- Completion Modal --}}
            @include('learn.partials.learn-result')
        </div>
    </div>

    {{-- Script learningApp tetap sama --}}
    <script>
        function learningApp(slides, title, group) {
            return {
                slides: slides,
                title: title,
                group: group,
                currentSlide: 0,
                answered: false,
                selectedAnswer: null,
                isCorrect: false,
                correctAnswer: null,
                correctCount: 0,
                quizCount: slides.filter(s => s.slide_type === 'quiz').length,
                showCompletion: false,

                get totalSlides() {
                    return this.slides.length;
                },
                get currentSlideData() {
                    return this.slides[this.currentSlide];
                },

                init() {
                    console.log("Learning app initialized", this.slides);
                },

                selectAnswer(answer) {
                    if (this.answered) return;

                    this.selectedAnswer = answer.answer_text;
                    this.answered = true;
                    this.isCorrect = answer.is_correct;
                    this.correctAnswer = this.currentSlideData.question?.answers?.find(a => a.is_correct)?.answer_text ||
                        null;

                    if (this.isCorrect) this.correctCount++;
                },

                nextSlide() {
                    if (this.currentSlide < this.totalSlides - 1) {
                        this.currentSlide++;
                        this.resetState();
                    } else {
                        // Slide terakhir → tampilkan completion modal
                        this.showCompletion = true;
                    }

                    // ===== Hitung progress =====
                    let totalSlides = this.totalSlides;

                    // Slide materi yang sudah dilewati
                    let completedSlides = this.slides.filter((s, i) => i <= this.currentSlide && s.slide_type ===
                        'material').length;

                    // Quiz yang dijawab benar
                    let correctSlides = this.correctCount;

                    let progress = Math.round((completedSlides + correctSlides) / totalSlides * 100);

                    // Kirim progress ke backend
                    fetch(`/learn/${this.group}/progress`, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    "content")
                            },
                            body: JSON.stringify({
                                progress: progress
                            })
                        })
                        .then(res => res.json())
                        .then(data => console.log("Progress saved:", data))
                        .catch(err => console.error("Error saving progress:", err));
                },

                previousSlide() {
                    if (this.currentSlide > 0) {
                        this.currentSlide--;
                        this.resetState();
                    }
                },

                resetState() {
                    this.answered = false;
                    this.selectedAnswer = null;
                    this.isCorrect = false;
                    this.correctAnswer = null;
                },

                restart() {
                    this.currentSlide = 0;
                    this.correctCount = 0;
                    this.resetState();
                    this.showCompletion = false;
                }
            };
        }
    </script>

</x-layout>
