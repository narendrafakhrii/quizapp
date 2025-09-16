<x-layout>
    <div x-data="quizApp()" x-init="init()">
        {{-- Header bar --}}
        <div class="flex justify-between items-center bg-white w-full h-14 shadow">
            <div class="flex items-center">
                <p class="ml-7 font-semibold">
                    Question <span x-text="currentIndex + 1"></span>
                </p>
                <span class="ml-4 text-sm text-gray-600">Font size: A A A</span>
            </div>
            <div class="flex justify-between items-center mr-7">
                <x-button.primary-button class="mr-4">QUESTION INFO</x-button.primary-button>
                <p class="mr-10 text-sm font-mono font-bold">
                    Time remaining <span id="timer">00:14:31</span>
                </p>
                <x-button.primary-button>Question List</x-button.primary-button>
            </div>
        </div>

        {{-- Card soal & passage --}}
        <x-card.primary-card class="p-6 mt-6 min-h-80">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                {{-- Passage --}}
                <div class="text-sm leading-relaxed">
                    <p class="font-semibold mb-3">Read the passage carefully!</p>
                    <div class="bg-gray-50 p-4 rounded-lg border max-h-[600px] overflow-y-auto">
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
                                            :value="answer.option" x-model="selectedAnswer" class="form-radio mt-1">
                                        <span class="text-gray-700" x-text="answer.option + '. ' + answer.text"></span>
                                    </label>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </x-card.primary-card>

        {{-- Navigation --}}
        <div class="w-full mt-4 grid grid-cols-1 md:grid-cols-3 items-center gap-4 px-5 pb-10">
            <div class="justify-self-center md:justify-self-start">
                <x-button.primary-button class="bg-red-500 hover:bg-red-600" x-bind:disabled="currentIndex === 0"
                    @click="prevQuestion()">← Previous Question</x-button.primary-button>
            </div>

            <div class="justify-self-center">
                <label
                    class="flex items-center px-4 py-2 rounded-lg border border-yellow-500 bg-yellow-400 text-white font-medium cursor-pointer transition hover:bg-yellow-500">
                    <input type="checkbox" x-model="doubtful"
                        class="w-3 h-3 mr-3 appearance-none rounded-sm bg-white checked:bg-yellow-600 checked:border-transparent cursor-pointer">
                    Mark as Doubtful
                </label>
            </div>

            <div class="justify-self-center md:justify-self-end">
                <x-button.primary-button class="bg-blue-500 hover:bg-blue-600"
                    x-bind:disabled="currentIndex >= questions.length - 1" @click="nextQuestion()">Next Question
                    →</x-button.primary-button>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function quizApp() {
                return {
                    questions: @json($questionsJson),
                    currentIndex: 0,
                    doubtful: false,
                    selectedAnswer: null,

                    init() {
                        console.log('Loaded questions:', this.questions);
                    },

                    get currentQuestion() {
                        return this.questions[this.currentIndex] || null;
                    },

                    get passageHtml() {
                        if (!this.currentQuestion?.passage_content)
                            return '<p class="text-gray-500">No passage available</p>';

                        try {
                            let content = this.currentQuestion.passage_content;
                            if (typeof content === 'string') content = JSON.parse(content);
                            if (Array.isArray(content)) {
                                return content.map(row =>
                                    `<p class="mb-3"><strong>${row.author}</strong> (${row.date}): ${row.content}</p>`
                                ).join('');
                            }
                            return '<p class="text-yellow-600">Unable to display passage content</p>';
                        } catch (e) {
                            console.error('Error parsing passage content:', e);
                            return '<p class="text-red-500">Error loading passage content</p>';
                        }
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
                    }
                }
            }
        </script>
    @endpush
    @stack('scripts')
</x-layout>
