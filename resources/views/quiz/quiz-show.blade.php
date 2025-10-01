    <x-layout>
        <div x-data="quiz({{ Js::from($quizData) }})" x-init="init()"
            class="h-screen flex flex-col bg-gradient-to-bl from-[#efeffc] to-[#adccef] overflow-hidden">

            {{-- Progress bar di atas --}}
            <div class="w-full p-4" x-cloak x-show="!quizFinished">
                <div class="max-w-3xl mx-auto">
                    <div class="bg-gray-300 rounded-full h-4 overflow-hidden">
                        <div class="bg-gradient-to-l from-[#d3c3fc] to-[#9ac5fc] h-4 rounded-full transition-all duration-300"
                            :style="`width: ${Math.min(currentIndex+1, total)/total*100}%`"></div>
                    </div>
                    <p class="text-sm text-gray-700 mt-1 text-center">
                        {{ __('Question') }} <span x-text="Math.min(currentIndex + 1, total)"></span> / <span
                            x-text="total"></span>
                    </p>
                </div>
            </div>


            {{-- Konten utama --}}
            <div class="flex-1 flex flex-col justify-center px-4 sm:px-6">
                <div class="max-w-3xl w-full mx-auto">

                    {{-- Baris waktu & tombol bantuan --}}
                    <div class="flex items-center justify-between mb-6">
                        <div class="text-lg font-semibold">
                            {{ __('Time Left:') }} <span x-text="formatTime(timers[currentIndex])"
                                class="text-red-500"></span>
                        </div>

                        {{-- Tombol bantuan --}}
                        <button class="px-4 py-2 rounded-xl bg-yellow-500 text-white hover:bg-yellow-600"
                            @click="$dispatch('open-modal', 'help-modal')">
                            {{ __('Hints left:') }} (<span x-text="maxHelp - helpUsed"></span>)
                        </button>

                        {{-- Modal Bantuan --}}
                        <x-modal name="help-modal">
                            <div class="p-4">
                                <h2 class="text-xl font-bold mb-2">{{ __('Hint') }}</h2>
                                <p>{{ __('Use a hint to remove one incorrect option') }}</p>
                                <p class="text-sm text-gray-500 mt-2">{{ __('Hints left') }} <span
                                        x-text="maxHelp - helpUsed"></span>
                                </p>
                                <button @click="useHelp(); $dispatch('close-modal', 'help-modal')"
                                    class="mt-4 px-4 py-2 bg-red-500 text-white rounded">
                                    {{ __('Use') }}
                                </button>
                            </div>
                        </x-modal>
                    </div>

                    {{-- Soal --}}
                    <template x-for="(question, index) in questions" :key="index" translate="no">
                        <div x-show="currentIndex === index && !quizFinished"
                            class="bg-white p-6 rounded-2xl shadow-md space-y-6 mb-4">

                            <h2 class="text-xl font-bold" x-text="question.question_text"></h2>
                            <div class="space-y-3">
                                <template x-for="option in question.options" :key="option.option_text">
                                    <div class="option-div flex items-center gap-3 p-3 rounded-xl border cursor-pointer transition-all duration-200"
                                        x-text="option.option_text"
                                        :class="{
                                            'bg-green-200 border-green-500': answered[index] && option.is_correct,
                                            'bg-red-200 border-red-500': answered[index] && selected[index] === option
                                                .option_text && !option.is_correct,
                                            'border-gray-300 hover:border-blue-400 hover:bg-blue-50': !answered[index],
                                            'opacity-50 cursor-not-allowed': answered[index] && !option.is_correct &&
                                                selected[index] !== option.option_text
                                        }"
                                        x-show="option.visible !== false" @click="selectOption(index, option)">
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>

                    {{-- Navigasi --}}
                    <div class="flex justify-between mb-6 mt-3" x-cloak x-show="!quizFinished">
                        <button class="px-4 py-2 rounded-xl bg-gray-300 hover:bg-gray-400" @click="prev()"
                            :disabled="currentIndex === 0">{{ __('Previous') }}</button>
                        <button class="px-4 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700" @click="next()"
                            :disabled="!answered[currentIndex]">{{ __('Next') }}</button>
                    </div>

                    {{-- Hasil Quiz --}}
                    <div x-show="quizFinished" x-cloak class="text-center space-y-6 mt-6">
                        <h2 class="text-2xl font-bold text-green-600">{{ __('Congrats!') }}</h2>
                        <p class="text-lg">{{ __('You’ve finished this quiz.') }}</p>
                        <p class="text-xl font-semibold">{{ __('Your score:') }} <span x-text="score"></span> / <span
                                x-text="total"></span>
                        </p>
                        <div class="text-3xl mt-4" x-text="badge"></div>
                        <button @click="restart()"
                            class="px-6 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700">{{ __('Try again') }}</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function quiz(questionsData) {
                return {
                    questions: questionsData,
                    total: questionsData.length,
                    currentIndex: 0,
                    defaultTime: 30,
                    interval: null,
                    timers: [],
                    answered: Array(questionsData.length).fill(false),
                    selected: Array(questionsData.length).fill(null),
                    score: 0,
                    quizFinished: false,
                    badge: '',
                    helpUsed: 0,
                    maxHelp: 3,

                    init() {
                        this.timers = Array(this.total).fill(this.defaultTime);
                        this.startTimer();
                    },

                    formatTime(t) {
                        return `00:${String(Math.max(t, 0)).padStart(2, '0')}`;
                    },

                    startTimer() {
                        clearInterval(this.interval);
                        if (this.answered[this.currentIndex]) {
                            this.timers[this.currentIndex] = 0;
                            return;
                        }
                        this.interval = setInterval(() => {
                            if (this.timers[this.currentIndex] > 0) {
                                this.timers[this.currentIndex]--;
                            } else {
                                clearInterval(this.interval);
                                this.next();
                            }
                        }, 1000);
                    },

                    selectOption(index, option) {
                        if (this.answered[index]) return;
                        this.answered[index] = true;
                        this.selected[index] = option.option_text;
                        if (option.is_correct) this.score++;
                        this.timers[index] = 0;
                        clearInterval(this.interval);
                    },

                    next() {
                        if (this.currentIndex < this.total - 1) {
                            this.currentIndex++;
                            this.startTimer();
                        } else {
                            this.finishQuiz();
                        }
                    },

                    prev() {
                        if (this.currentIndex > 0) {
                            this.currentIndex--;
                            this.startTimer();
                        }
                    },

                    finishQuiz() {
                        clearInterval(this.interval);
                        this.quizFinished = true;
                        if (this.score === this.total) {
                            this.badge = @json(__('Master Quiz!'));
                        } else if (this.score >= this.total * 0.7) {
                            this.badge = @json(__('Great! You almost got a perfect score!'));
                        } else if (this.score >= this.total * 0.5) {
                            this.badge = @json(__('Good! Keep practicing!'));
                        } else {
                            this.badge = @json(__('Don’t give up, try again!'));
                        }

                    },

                    restart() {
                        clearInterval(this.interval);
                        this.currentIndex = 0;
                        this.answered.fill(false);
                        this.selected.fill(null);
                        this.score = 0;
                        this.quizFinished = false;
                        this.timers = Array(this.total).fill(this.defaultTime);
                        this.startTimer();
                    },

                    useHelp() {
                        if (this.helpUsed >= this.maxHelp) return;

                        if (this.answered[this.currentIndex] || this.timers[this.currentIndex] === 0) return;

                        const currentQuestion = this.questions[this.currentIndex];
                        const wrongOptions = currentQuestion.options.filter(
                            (o) => !o.is_correct && o.visible !== false
                        );

                        if (wrongOptions.length > 0) {
                            const randomWrongOption = wrongOptions[Math.floor(Math.random() * wrongOptions.length)];
                            randomWrongOption.visible = false;
                            this.helpUsed++;
                        }
                    },
                };
            }
        </script>
    </x-layout>
