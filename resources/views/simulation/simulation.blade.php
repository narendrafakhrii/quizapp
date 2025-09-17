<x-layout>
    <div x-data="quizApp()" x-init="init()" class="flex flex-col h-screen">
        {{-- Header bar --}}
        <div class="flex justify-between items-center bg-white w-full h-14 shadow flex-shrink-0 px-6">
            <div class="flex items-center space-x-4">
                <p class="font-semibold">
                    {{ __('Question ') }}<span x-text="currentIndex + 1"></span>
                </p>
            </div>
            <div class="flex items-center space-x-4">
                <p class="text-sm font-mono font-bold border-2 border-red-600 py-1 px-3 rounded-md">
                    {{ __('Time Remaining') }} <span id="timer">00:15:00</span>
                </p>
                <x-button.primary-button @click="showQuestionList = true">
                    {{ __('Question List') }}
                </x-button.primary-button>
            </div>
        </div>

        {{-- Card soal & passage --}}
        <x-card.primary-card class="p-6 flex-1 mt-4" style="max-height: calc(100vh - 120px)">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 h-full">
                {{-- Passage --}}
                <div class="text-sm leading-relaxed lg:pr-6">
                    <p class="font-semibold mb-3">Read the passage carefully!</p>
                    <div class="bg-gray-50 p-3 rounded-lg border h-full max-h-[350px] overflow-auto">
                        <template x-if="!currentQuestion">
                            <p class="text-red-500">Loading question...</p>
                        </template>
                        <template x-if="currentQuestion && !currentQuestion.passage_content">
                            <p class="text-gray-500">No passage content available</p>
                        </template>
                        <template x-if="currentQuestion && currentQuestion.passage_content">
                            <div x-html="passageHtml"></div>
                        </template>
                    </div>
                </div>

                {{-- Question & Answers --}}
                <div class="pl-6 border-l-4 border-blue-300">
                    <template x-if="!currentQuestion">
                        <div>
                            <h3 class="font-semibold text-lg mb-2 text-gray-800">Loading...</h3>
                            <p class="text-gray-500">Please wait...</p>
                        </div>
                    </template>

                    <template x-if="currentQuestion">
                        <div>
                            <h3 class="font-semibold text-lg mb-2 text-gray-800">Question:</h3>
                            <p class="mb-4 leading-relaxed text-gray-700" x-text="currentQuestion.question"></p>

                            {{-- Jawaban --}}
                            <div class="bg-blue-50 p-4 rounded-lg mb-6" x-show="currentQuestion.answers?.length > 0">
                                <h4 class="font-medium mb-3 text-gray-800">Choose the correct answer:</h4>
                                <template x-for="answer in currentQuestion.answers" :key="answer.id">
                                    <label
                                        class="flex items-start space-x-3 cursor-pointer hover:bg-white p-2 rounded transition">
                                        <input type="radio" :name="'answer_' + currentQuestion.id"
                                            :value="answer.option" @click="selectAnswer(answer.option)"
                                            x-model="selectedAnswer" class="form-radio mt-1">
                                        <span class="text-gray-700" x-text="answer.option + '. ' + answer.text"></span>
                                    </label>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </x-card.primary-card>

        {{-- Navigation / Footer --}}
        <div class="w-full mt-4 grid grid-cols-1 md:grid-cols-3 items-center gap-4 px-5 pb-4 flex-shrink-0">
            <div class="justify-self-center md:justify-self-start">
                <x-button.primary-button class="bg-red-500 hover:bg-red-600" x-bind:disabled="currentIndex === 0"
                    @click="prevQuestion()">
                    {{ __('Previous Question') }}
                </x-button.primary-button>
            </div>

            <div class="justify-self-center">
                <label
                    class="flex items-center px-4 py-2 rounded-lg border border-yellow-500 bg-yellow-400 text-white font-medium cursor-pointer transition hover:bg-yellow-500">
                    <input type="checkbox" x-model="doubtful"
                        class="w-3 h-3 mr-3 appearance-none rounded-sm bg-white checked:bg-yellow-600 checked:border-transparent cursor-pointer"
                        @click="toggleDoubtful()">
                    {{ __('Mark as Doubtful') }}
                </label>
            </div>

            <div class="justify-self-center md:justify-self-end">
                <x-button.primary-button class="bg-blue-500 hover:bg-blue-600"
                    x-bind:disabled="currentIndex >= questions.length - 1" @click="nextQuestion()">
                    {{ __('Next Question') }}
                </x-button.primary-button>
            </div>
        </div>

        {{-- Modal Question List --}}
        @include('simulation.partials.question-list')

    </div>

    @push('scripts')
        <script>
            function quizApp() {
                return {
                    questions: @json($questionsJson).map(q => ({
                        ...q,
                        doubtful: false,
                        answers: q.answers?.map(a => ({
                            ...a,
                            selected: false
                        })) || []
                    })),
                    currentIndex: 0,
                    doubtful: false,
                    selectedAnswer: null,
                    showQuestionList: false,

                    // Timer
                    timeRemaining: 15 * 60,
                    timerInterval: null,

                    init() {
                        this.startTimer();
                        console.log('Loaded questions:', this.questions);
                    },

                    get currentQuestion() {
                        return this.questions[this.currentIndex] || null;
                    },

                    get passageHtml() {
                        if (!this.currentQuestion?.passage_content?.length) {
                            return '<p class="text-gray-500">No passage available</p>';
                        }

                        if (this.currentQuestion.passage_type === 'two_text') {
                            return this.currentQuestion.passage_content.map(row =>
                                `<div class="grid grid-cols-2 gap-4 mb-2">
                                    <span class="font-bold">${row.author}</span>
                                    <span>${row.content}</span>
                                </div>`
                            ).join('');
                        }

                        return this.currentQuestion.passage_content.map(row =>
                            `<p>${row.content}</p>`
                        ).join('');
                    },

                    selectAnswer(option) {
                        this.selectedAnswer = option;
                        this.currentQuestion.answers.forEach(a => {
                            a.selected = a.option === option;
                        });
                    },

                    toggleDoubtful() {
                        this.currentQuestion.doubtful = !this.currentQuestion.doubtful;
                    },

                    nextQuestion() {
                        if (this.currentIndex < this.questions.length - 1) {
                            this.currentIndex++;
                            this.selectedAnswer = null;
                        }
                    },

                    prevQuestion() {
                        if (this.currentIndex > 0) {
                            this.currentIndex--;
                            this.selectedAnswer = null;
                        }
                    },

                    startTimer() {
                        this.updateTimerDisplay();
                        this.timerInterval = setInterval(() => {
                            if (this.timeRemaining > 0) {
                                this.timeRemaining--;
                                this.updateTimerDisplay();
                            } else {
                                clearInterval(this.timerInterval);
                                alert("Time is up!");
                            }
                        }, 1000);
                    },

                    updateTimerDisplay() {
                        const minutes = String(Math.floor(this.timeRemaining / 60)).padStart(2, '0');
                        const seconds = String(this.timeRemaining % 60).padStart(2, '0');
                        document.getElementById('timer').textContent = `00:${minutes}:${seconds}`;
                    }
                }
            }
        </script>
    @endpush
    @stack('scripts')
</x-layout>
