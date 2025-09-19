<x-layout>
    <div x-data="quiz({{ $questions }})" x-init="init()" class="max-w-3xl mx-auto p-6 space-y-8">

        {{-- Header Level Info --}}
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Grammar Quiz</h1>
            <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium
                {{ $level === 'newbie' ? 'bg-green-100 text-green-800' : '' }}
                {{ $level === 'intermediate' ? 'bg-yellow-100 text-yellow-800' : '' }}
                {{ $level === 'expert' ? 'bg-red-100 text-red-800' : '' }}">
                Level: {{ ucfirst($level) }}
            </div>
        </div>

        {{-- Progress bar di atas --}}
        <div class="w-full text-center mb-4" x-cloak x-show="!quizFinished">
            <div class="mx-auto w-3/4 bg-gray-300 rounded-full h-4 overflow-hidden">
                <div class="bg-green-500 h-4 rounded-full transition-all duration-300"
                    :style="`width: ${Math.min(currentIndex+1, total)/total*100}%`"></div>
            </div>
            <p class="text-sm text-gray-700 mt-1">
                Soal <span x-text="Math.min(currentIndex + 1, total)"></span> / <span x-text="total"></span>
            </p>
        </div>

        {{-- Baris waktu & tombol bantuan --}}
        <div class="flex items-center justify-between mb-6">
            <div class="text-lg font-semibold">
                Time left: <span x-text="formatTime(timers[currentIndex])" class="text-red-500"></span>
            </div>

            {{-- Tombol bantuan --}}
            <button class="px-4 py-2 rounded-xl bg-yellow-500 text-white hover:bg-yellow-600"
                @click="$dispatch('open-modal', 'help-modal')">
                Bantuan (<span x-text="maxHelp - helpUsed"></span> tersisa)
            </button>

            {{-- Modal Bantuan --}}
            <x-modal name="help-modal">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-2">Bantuan</h2>
                    <p>Gunakan bantuan untuk menghilangkan 1 opsi jawaban salah.</p>
                    <p class="text-sm text-gray-500 mt-2">Sisa bantuan: <span x-text="maxHelp - helpUsed"></span></p>

                    {{-- Tombol Gunakan bantuan --}}
                    <button @click="useHelp(); $dispatch('close-modal', 'help-modal')"
                        class="mt-4 px-4 py-2 bg-red-500 text-white rounded">
                        Gunakan
                    </button>
                </div>
            </x-modal>
        </div>


        {{-- Soal --}}
        <template x-for="(question, index) in questions" :key="index">
            <div x-show="currentIndex === index && !quizFinished" class="bg-white p-6 rounded-2xl shadow-md space-y-6">
                <h2 class="text-xl font-bold" x-text="question.question_text"></h2>
                <div class="space-y-3">
                    <template x-for="option in question.options" :key="option.option_text">
                        <div class="option-div flex items-center gap-3 p-3 rounded-xl border cursor-pointer hover:bg-gray-50"
                            x-text="option.option_text"
                            :class="{
                                'bg-green-200 border-green-500': answered[index] && option.is_correct,
                                'bg-red-200 border-red-500': answered[index] && selected[index] === option
                                    .option_text && !option.is_correct
                            }"
                            x-show="option.visible !== false" {{-- Sembunyikan opsi jika visible === false --}}
                            @click="selectOption(index, option)">
                        </div>
                    </template>
                </div>
            </div>
        </template>

        {{-- Navigasi --}}
        <div class="flex justify-between mt-4" x-cloak x-show="!quizFinished">
            <button class="px-4 py-2 rounded-xl bg-gray-300 hover:bg-gray-400" @click="prev()"
                :disabled="currentIndex === 0">Sebelumnya</button>
            <button class="px-4 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700" @click="next()"
                :disabled="!answered[currentIndex]">Selanjutnya</button>
        </div>

        {{-- Hasil Quiz --}}
        <div x-show="quizFinished" x-cloak class="text-center space-y-6 mt-6">
            <h2 class="text-2xl font-bold text-green-600">Selamat!</h2>
            <p class="text-lg">Kamu sudah menyelesaikan kuis Grammar level {{ ucfirst($level) }}!</p>
            <p class="text-xl font-semibold">Skor kamu: <span x-text="score"></span> / <span x-text="total"></span></p>
            <div class="text-3xl mt-4" x-text="badge"></div>
            <div class="flex gap-4 justify-center">
                <button @click="restart()" class="px-6 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700">Coba Lagi</button>
                <a href="{{ route('level') }}" class="px-6 py-2 rounded-xl bg-gray-600 text-white hover:bg-gray-700">Pilih Level Lain</a>
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
                    if (this.score === this.total) this.badge = "Master Quiz!";
                    else if (this.score >= this.total * 0.7) this.badge = "Hebat! Kamu hampir sempurna!";
                    else if (this.score >= this.total * 0.5) this.badge = "Bagus! Terus berlatih!";
                    else this.badge = "Jangan menyerah, coba lagi!";
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
                    // Batasi penggunaan bantuan
                    if (this.helpUsed >= this.maxHelp) return;

                    // Cek apakah soal sudah dijawab atau waktu habis
                    if (this.answered[this.currentIndex] || this.timers[this.currentIndex] === 0) return;

                    const currentQuestion = this.questions[this.currentIndex];
                    const wrongOptions = currentQuestion.options.filter(
                        (o) => !o.is_correct && o.visible !== false
                    );

                    if (wrongOptions.length > 0) {
                        // Acak dan pilih satu opsi salah untuk disembunyikan
                        const randomWrongOption = wrongOptions[Math.floor(Math.random() * wrongOptions.length)];
                        randomWrongOption.visible = false; // Tandai opsi sebagai tidak terlihat
                        this.helpUsed++;
                    }
                },
            };
        }
    </script>
</x-layout>
