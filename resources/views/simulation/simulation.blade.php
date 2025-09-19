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
        <x-card.primary-card class="p-6 flex-1 mt-4 overflow-hidden" style="max-height: calc(100vh - 120px)">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 h-full">
                {{-- Passage --}}
                <div class="text-sm leading-relaxed lg:pr-6 flex flex-col overflow-hidden">
                    <template x-if="currentQuestion && currentQuestion.passage_content">
                        <div class="flex flex-col h-full">
                            <p class="font-semibold mb-3 flex-shrink-0">Read the passage carefully!</p>
                            <div class="bg-gray-50 p-4 rounded-lg border flex-1 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200 hover:scrollbar-thumb-gray-500" style="margin-bottom: 16px;">
                                <template x-if="currentQuestion.passage_type === 'table'">
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full border-collapse border border-gray-300">
                                            <template x-for="(row, index) in currentQuestion.passage_content"
                                                :key="index">
                                                <tr>
                                                    <td class="border border-gray-300 px-3 py-2 text-sm">
                                                        <div class="font-semibold text-blue-600" x-text="row.author">
                                                        </div>
                                                        <div class="text-xs text-gray-500 mb-2"
                                                            x-text="'Posted: ' + row.date"></div>
                                                    </td>
                                                    <td class="border border-gray-300 px-3 py-2 text-sm">
                                                        <p class="text-gray-700 leading-relaxed" x-text="row.content">
                                                        </p>
                                                    </td>
                                                </tr>
                                            </template>
                                        </table>
                                    </div>
                                </template>
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
                                                            x-html="textItem.content.replace(/\n\n/g, '</p><p>').replace(/^/, '<p>').replace(/$/, '</p>')">
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
                                <template x-if="currentQuestion.passage_type === 'paragraph'">
                                    <div class="space-y-4">
                                        <template x-for="(item, index) in currentQuestion.passage_content"
                                            :key="index">
                                            <p class="text-gray-700 leading-relaxed text-justify" x-text="item.content">
                                            </p>
                                        </template>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>
                    <template x-if="!currentQuestion || !currentQuestion.passage_content">
                        <div class="flex flex-col h-full">
                            <p class="font-semibold mb-3 flex-shrink-0">Read the passage carefully!</p>
                            <div class="bg-gray-50 p-4 rounded-lg border flex-1 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200 hover:scrollbar-thumb-gray-500" style="margin-bottom: 16px;">
                                <p class="text-gray-500 text-center">No passage content available for this question</p>
                            </div>
                        </div>
                    </template>
                </div>

                {{-- Question & Answers --}}
                <div class="pl-6 border-l-4 border-blue-300 overflow-y-auto scrollbar-thin scrollbar-thumb-blue-400 scrollbar-track-blue-100 hover:scrollbar-thumb-blue-500" style="margin-bottom: 16px;">
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
                                <div class="space-y-2">
                                    <template x-for="answer in currentQuestion.answers" :key="answer.id">
                                    <label
                                        class="flex items-start space-x-3 cursor-pointer hover:bg-white p-2 rounded transition"
                                        :class="{ 'bg-blue-100': selectedAnswer === answer.option }">
                                        <input type="radio" :name="'answer_' + currentQuestion.id"
                                            :value="answer.option" @change="selectAnswer(answer.option)"
                                            :checked="selectedAnswer === answer.option"
                                            class="form-radio mt-1 text-blue-600">
                                        <span class="text-gray-700" x-text="answer.option + '. ' + answer.text"></span>
                                    </label>
                                    </template>
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
                <x-button.primary-button class="bg-blue-500 hover:bg-blue-600" :disabled="true"
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
                        selectedAnswer: null,
                        answers: q.answers?.map(a => ({
                            ...a,
                            selected: false
                        })) || []
                    })),
                    currentIndex: 0,
                    selectedAnswer: null,
                    showQuestionList: false,

                    // Timer
                    timeRemaining: 15 * 60,
                    timerInterval: null,

                    init() {
                        this.startTimer();
                        this.loadCurrentQuestion();
                        console.log('Loaded questions:', this.questions);
                    },

                    get currentQuestion() {
                        return this.questions[this.currentIndex] || null;
                    },

                    get isCurrentQuestionDoubtful() {
                        return this.currentQuestion ? this.currentQuestion.doubtful : false;
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
