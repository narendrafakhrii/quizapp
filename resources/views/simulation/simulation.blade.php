<x-layout>
    <section x-data="{ showMainContent: false }">
        {{-- Rule Simulation - Ditampilkan pertama kali --}}
        <template x-if="!showMainContent">
            @include('simulation.partials.rule-simulation')
        </template>

        {{-- Main Simulation Content - Ditampilkan setelah klik mulai --}}
        <div x-data="quizApp()" x-init="init()" x-show="showMainContent" x-cloak
            x-on:start-simulation.window="startTimer(), loadCurrentQuestion()" class="flex flex-col h-screen">

            {{-- Header bar --}}
            <div class="flex justify-between items-center bg-white w-full h-14 shadow flex-shrink-0 px-6">
                <div class="flex items-center space-x-4">
                    <p class="font-semibold">
                        {{ __('Question ') }}<span x-text="currentIndex + 1"></span>
                    </p>
                </div>
                <div class="flex items-center space-x-4">
                    <p class="text-sm font-mono font-bold border-2 border-red-600 py-1 px-3 rounded-md">
                        {{ __('Time Remaining') }} <span id="timer"></span>
                    </p>
                    <x-button.primary-button @click="showQuestionList = true">
                        {{ __('Question List') }}
                    </x-button.primary-button>
                </div>
            </div>

            {{-- Card soal & passage --}}
            <x-card.primary-card oncontextmenu="return false" class="p-6 flex-1 mt-4 overflow-hidden select-none"
                style="max-height: calc(100vh - 120px)" translate="no">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 h-full">
                    {{-- Card kiri (Passage) --}}
                    <div class="primary-card h-[450px] flex flex-col">
                        <div class="text-sm leading-relaxed flex flex-col mb-6 overflow-hidden">
                            <p class="font-semibold mb-3 flex-shrink-0">Read the passage carefully!</p>

                            <template x-if="currentQuestion && currentQuestion.passage_content">
                                <div
                                    class="flex-1 overflow-y-auto bg-gray-50 p-4 rounded-lg border mb-4
                        scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200 hover:scrollbar-thumb-gray-500">

                                    {{-- Paragraph --}}
                                    <template x-if="currentQuestion.passage_type === 'paragraph'">
                                        <div class="space-y-4">
                                            <template x-for="(item, index) in currentQuestion.passage_content"
                                                :key="index">
                                                <p class="text-gray-700 leading-relaxed text-justify"
                                                    x-text="item.content">
                                                </p>
                                            </template>
                                        </div>
                                    </template>

                                    {{-- Two Text --}}
                                    <template x-if="currentQuestion.passage_type === 'two_text'">
                                        <div class="space-y-6">
                                            <template x-for="(textItem, textIndex) in currentQuestion.passage_content"
                                                :key="textIndex">
                                                <div class="border rounded-lg p-4 bg-white">
                                                    <template x-if="textItem.title">
                                                        <h4 class="font-bold text-lg mb-3 text-gray-800"
                                                            x-text="textItem.title"></h4>
                                                    </template>
                                                    <div class="prose prose-sm max-w-none">
                                                        <template x-if="typeof textItem.content === 'string'">
                                                            <div
                                                                x-html="textItem.content
                                            .replace(/\n\n/g, '</p><p>')
                                            .replace(/^/, '<p>')
                                            .replace(/$/, '</p>')">
                                                            </div>
                                                        </template>
                                                        <template x-if="typeof textItem.content !== 'string'">
                                                            <p x-text="textItem.content"></p>
                                                        </template>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </template>

                                    {{-- Table --}}
                                    <template x-if="currentQuestion.passage_type === 'table'">
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full border-collapse border border-gray-300">
                                                <template x-for="(row, index) in currentQuestion.passage_content"
                                                    :key="index">
                                                    <tr>
                                                        <td class="border border-gray-300 px-3 py-2 text-sm">
                                                            <div class="font-semibold text-blue-600"
                                                                x-text="row.author">
                                                            </div>
                                                            <div class="text-xs text-gray-500 mb-2"
                                                                x-text="'Posted: ' + row.date"></div>
                                                        </td>
                                                        <td class="border border-gray-300 px-3 py-2 text-sm">
                                                            <p class="text-gray-700 leading-relaxed"
                                                                x-text="row.content">
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </table>
                                        </div>
                                    </template>
                                </div>
                            </template>

                            <template x-if="!currentQuestion || !currentQuestion.passage_content">
                                <div
                                    class="flex-1 overflow-y-auto bg-gray-50 p-4 rounded-lg border 
                        scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200 hover:scrollbar-thumb-gray-500">
                                    <p class="text-gray-500 text-center">No passage content available for this question
                                    </p>
                                </div>
                            </template>
                        </div>
                    </div>

                    {{-- Question & Answers --}}
                    <div class="primary-card h-[450px] flex flex-col pl-6 border-l-4 border-blue-300">
                        <template x-if="!currentQuestion">
                            <div
                                class="flex-1 overflow-y-auto bg-gray-50 p-4 rounded-lg border 
                    scrollbar-thin scrollbar-thumb-blue-400 scrollbar-track-blue-100 hover:scrollbar-thumb-blue-500">
                                <h3 class="font-semibold text-lg mb-2 text-gray-800">Loading...</h3>
                                <p class="text-gray-500">Please wait...</p>
                            </div>
                        </template>

                        <template x-if="currentQuestion">
                            <div class="flex flex-col h-full overflow-hidden mb-4">
                                <h3 class="font-semibold text-lg mb-2 text-gray-800 flex-shrink-0">Question:</h3>

                                <div
                                    class="flex-1 overflow-y-auto pr-2 
                        scrollbar-thin scrollbar-thumb-blue-400 scrollbar-track-blue-100 hover:scrollbar-thumb-blue-500">
                                    <p class="mb-4 leading-relaxed text-gray-700" x-text="currentQuestion.question"></p>

                                    {{-- Jawaban --}}
                                    <div class="bg-blue-50 p-4 rounded-lg mb-6"
                                        x-show="currentQuestion.answers?.length > 0">
                                        <h4 class="font-medium mb-3 text-gray-800">Choose the correct answer:</h4>
                                        <div class="space-y-2">
                                            <template x-for="answer in currentQuestion.answers" :key="answer.id">
                                                <label
                                                    class="flex items-start space-x-3 cursor-pointer hover:bg-white p-2 rounded transition"
                                                    :class="{ 'bg-blue-100': selectedAnswer === answer.option }">
                                                    <input type="radio" :name="'answer_' + currentQuestion.id"
                                                        :value="answer.option" @change="selectAnswer(answer.option)"
                                                        :checked="selectedAnswer === answer.option"
                                                        class="form-radio mt-1 text-blue-600">
                                                    <span class="text-gray-700"
                                                        x-text="answer.option + '. ' + answer.text"></span>
                                                </label>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                </div>
            </x-card.primary-card>

            {{-- Navigation / Footer --}}
            <div class="w-full mt-4 grid grid-cols-1 md:grid-cols-3 items-center gap-4 px-5 pb-4 flex-shrink-0">
                <div class="justify-self-center md:justify-self-start">
                    <x-button.primary-button class="bg-red-500 hover:bg-red-600" :disabled="true"
                        x-bind:disabled="currentIndex === 0" @click="prevQuestion()">
                        {{ __('Previous Question') }}
                    </x-button.primary-button>
                </div>

                <div class="justify-self-center">
                    <label
                        class="flex items-center px-4 py-2 rounded-lg border border-yellow-500 bg-yellow-400 text-white font-medium cursor-pointer transition hover:bg-yellow-500"
                        :class="{ 'bg-yellow-600': isCurrentQuestionDoubtful }">
                        <input type="checkbox" :checked="isCurrentQuestionDoubtful" @change="toggleDoubtful()"
                            class="w-3 h-3 mr-3 appearance-none rounded-sm bg-white checked:bg-yellow-600 checked:border-transparent cursor-pointer">
                        {{ __('Mark as Doubtful') }}
                    </label>
                </div>

                <div class="justify-self-center md:justify-self-end">
                    <!-- Tombol Next atau Finish berdasarkan posisi soal -->
                    <template x-if="currentIndex < questions.length - 1">
                        <x-button.primary-button class="bg-blue-500 hover:bg-blue-600" @click="nextQuestion()">
                            {{ __('Next Question') }}
                        </x-button.primary-button>
                    </template>

                    <template x-if="currentIndex === questions.length - 1">
                        <x-button.primary-button class="bg-green-600 hover:bg-green-700"
                            @click="showConfirmFinish = true">
                            {{ __('Finish') }}
                        </x-button.primary-button>
                    </template>
                </div>
            </div>

            {{-- Modal Question List --}}
            @include('simulation.partials.question-list')

            {{-- Modal Confirm Finish --}}
            @include('simulation.partials.confirm-finish')

            {{-- Result Screen - Ditampilkan setelah simulasi selesai --}}
            <template x-if="showResult">
                @include('simulation.partials.result-simulation')
            </template>

        </div>
    </section>

    @push('scripts')
        <script>
            function quizApp() {
                return {
                    questions: @json($questionsJson).map(q => ({
                        ...q,
                        doubtful: false,
                        selectedAnswer: null,
                        answers: q.answers?.map(a => ({
                            ...a,
                            selected: false
                        })) || []
                    })),
                    currentIndex: 0,
                    selectedAnswer: null,
                    showQuestionList: false,
                    showConfirmFinish: false,
                    showResult: false,
                    showDetailedReview: false,

                    // Timer
                    timeRemaining: 45 * 60,
                    timerInterval: null,
                    totalTime: 45 * 60,

                    // Results
                    finalScore: 0,
                    correctAnswers: 0,
                    wrongAnswers: 0,

                    init() {
                        // Initialization code
                    },

                    get currentQuestion() {
                        return this.questions[this.currentIndex] || null;
                    },

                    get isCurrentQuestionDoubtful() {
                        return this.currentQuestion ? this.currentQuestion.doubtful : false;
                    },

                    get answeredCount() {
                        return this.questions.filter(q => q.selectedAnswer !== null).length;
                    },

                    get unansweredCount() {
                        return this.questions.length - this.answeredCount;
                    },

                    get doubtfulCount() {
                        return this.questions.filter(q => q.doubtful).length;
                    },

                    get timeLeftFormatted() {
                        const minutes = Math.floor(this.timeRemaining / 60);
                        const seconds = this.timeRemaining % 60;
                        return `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                    },

                    get timeUsedFormatted() {
                        const timeUsed = this.totalTime - this.timeRemaining;
                        const minutes = Math.floor(timeUsed / 60);
                        const seconds = timeUsed % 60;
                        return `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                    },

                    get averageTimePerQuestion() {
                        const timeUsed = this.totalTime - this.timeRemaining;
                        return Math.round(timeUsed / this.questions.length);
                    },

                    get accuracyPercentage() {
                        if (this.answeredCount === 0) return 0;
                        return Math.round((this.correctAnswers / this.answeredCount) * 100);
                    },

                    get performanceLevel() {
                        const percentage = this.accuracyPercentage;

                        if (percentage >= 90) {
                            return {
                                title: 'Excellent!',
                                message: 'Performa Anda sangat luar biasa! Pertahankan prestasi ini.',
                                icon: '🎉',
                                bgClass: 'bg-green-50',
                                borderClass: 'border-green-400',
                                textClass: 'text-green-800',
                                descClass: 'text-green-600'
                            };
                        } else if (percentage >= 75) {
                            return {
                                title: 'Good Job!',
                                message: 'Performa Anda baik. Terus tingkatkan kemampuan Anda.',
                                icon: '👏',
                                bgClass: 'bg-blue-50',
                                borderClass: 'border-blue-400',
                                textClass: 'text-blue-800',
                                descClass: 'text-blue-600'
                            };
                        } else if (percentage >= 60) {
                            return {
                                title: 'Keep Trying!',
                                message: 'Performa cukup baik. Perbanyak latihan untuk hasil yang lebih baik.',
                                icon: '💪',
                                bgClass: 'bg-yellow-50',
                                borderClass: 'border-yellow-400',
                                textClass: 'text-yellow-800',
                                descClass: 'text-yellow-600'
                            };
                        } else {
                            return {
                                title: 'Need Improvement',
                                message: 'Jangan menyerah! Perbanyak belajar dan latihan soal.',
                                icon: '📚',
                                bgClass: 'bg-red-50',
                                borderClass: 'border-red-400',
                                textClass: 'text-red-800',
                                descClass: 'text-red-600'
                            };
                        }
                    },

                    loadCurrentQuestion() {
                        if (this.currentQuestion) {
                            this.selectedAnswer = this.currentQuestion.selectedAnswer || null;
                        }
                    },

                    selectAnswer(option) {
                        this.selectedAnswer = option;
                        if (this.currentQuestion) {
                            this.currentQuestion.selectedAnswer = option;
                            this.currentQuestion.answers.forEach(a => {
                                a.selected = a.option === option;
                            });
                        }
                    },

                    toggleDoubtful() {
                        if (this.currentQuestion) {
                            this.currentQuestion.doubtful = !this.currentQuestion.doubtful;
                        }
                    },

                    nextQuestion() {
                        if (this.currentIndex < this.questions.length - 1) {
                            this.currentIndex++;
                            this.loadCurrentQuestion();
                        }
                    },

                    prevQuestion() {
                        if (this.currentIndex > 0) {
                            this.currentIndex--;
                            this.loadCurrentQuestion();
                        }
                    },

                    startTimer() {
                        // jangan mulai dua kali
                        if (this.timerInterval) return;

                        // Pastikan DOM sudah render dulu
                        this.$nextTick(() => {
                            this.updateTimerDisplay();

                            this.timerInterval = setInterval(() => {
                                if (this.timeRemaining > 0) {
                                    this.timeRemaining = Math.max(this.timeRemaining - 1, 0);
                                    this.updateTimerDisplay();
                                } else {
                                    clearInterval(this.timerInterval);
                                    this.timerInterval = null;
                                    this.finishSimulation();
                                }
                            }, 1000);
                        });
                    },


                    updateTimerDisplay() {
                        const minutes = String(Math.floor(this.timeRemaining / 60)).padStart(2, '0');
                        const seconds = String(this.timeRemaining % 60).padStart(2, '0');
                        const timerElement = document.getElementById('timer');
                        if (timerElement) {
                            timerElement.textContent = `00:${minutes}:${seconds}`;
                        }
                    },

                    calculateScore() {
                        this.correctAnswers = 0;
                        this.wrongAnswers = 0;

                        this.questions.forEach(question => {
                            if (question.selectedAnswer !== null) {
                                const correctAnswer = question.answers.find(a => a.is_correct);
                                if (correctAnswer && question.selectedAnswer === correctAnswer.option) {
                                    this.correctAnswers++;
                                } else {
                                    this.wrongAnswers++;
                                }
                            }
                        });

                        // Scoring system: +4 for correct, -1 for wrong, 0 for unanswered
                        this.finalScore = (this.correctAnswers * 4) - (this.wrongAnswers * 1);
                    },

                    finishSimulation() {
                        // Clear timer
                        if (this.timerInterval) {
                            clearInterval(this.timerInterval);
                        }

                        // Calculate final score
                        this.calculateScore();

                        // Close any open modals
                        this.showConfirmFinish = false;
                        this.showQuestionList = false;

                        // Show results
                        this.showResult = true;
                    }
                }
            }
        </script>
    @endpush
    @stack('scripts')
</x-layout>
