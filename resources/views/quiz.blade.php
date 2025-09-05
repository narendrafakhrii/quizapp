<x-layout>
    <div class="max-w-3xl mx-auto p-6 space-y-8">

        @php
            $total = $questions->count();
        @endphp

        {{-- Header: Timer + Progress --}}
        <div class="flex items-center justify-between mb-6">
            <div class="text-lg font-semibold">
                Waktu tersisa: <span id="timer" class="text-red-500">00:30</span>
            </div>
            <div class="flex-1 ml-6">
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div id="progress-bar" class="bg-green-600 h-3 rounded-full" style="width: 0%"></div>
                </div>
                <p class="text-sm text-gray-600 mt-1 text-right">
                    Soal <span id="current-question">1</span> / <span id="total-questions">{{ $total }}</span>
                </p>
            </div>
        </div>

        {{-- Soal Container --}}
        <div id="question-container">
            @foreach ($questions as $question)
                <x-card.question-card :question="$question" style="display: none;" />
            @endforeach
        </div>

        {{-- Navigasi --}}
        <div class="flex justify-between mt-4">
            <button id="prev-btn" class="px-4 py-2 rounded-xl bg-gray-300 hover:bg-gray-400"
                disabled>Sebelumnya</button>
            <button id="next-btn" class="px-4 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700"
                disabled>Selanjutnya</button>
        </div>

    </div>

    <script>
        const questions = document.querySelectorAll('#question-container > div');
        const nextBtn = document.getElementById('next-btn');
        const prevBtn = document.getElementById('prev-btn');
        const timerEl = document.getElementById('timer');
        const progressBar = document.getElementById('progress-bar');
        const currentQuestionEl = document.getElementById('current-question');
        const totalQuestions = {{ $total }};
        let currentIndex = 0;
        let timePerQuestion = 30;
        let interval;
        let score = 0;

        function showQuestion(index) {
            questions.forEach((q, i) => q.style.display = i === index ? 'block' : 'none');
            currentQuestionEl.textContent = index + 1;
            prevBtn.disabled = index === 0;
            nextBtn.disabled = true; // disable next sampai dijawab atau timer habis
            resetTimer();
            attachOptionEvents(questions[index]);
        }

        function resetTimer() {
            clearInterval(interval);
            let time = timePerQuestion;
            timerEl.textContent = `00:${String(time).padStart(2,'0')}`;
            interval = setInterval(() => {
                time--;
                timerEl.textContent = `00:${String(time).padStart(2,'0')}`;
                if (time <= 0) {
                    clearInterval(interval);
                    nextBtn.disabled = false;
                    markUnanswered(questions[currentIndex]);
                }
            }, 1000);
        }

        function attachOptionEvents(questionDiv) {
            const options = questionDiv.querySelectorAll('.option-div');
            options.forEach(option => {
                option.style.pointerEvents = 'auto';
                option.addEventListener('click', () => {
                    const isCorrect = option.dataset.correct === 'true';
                    if (isCorrect) score++;
                    markAnswers(questionDiv, option.dataset.value);
                    clearInterval(interval);
                    nextBtn.disabled = false;
                });
            });
        }

        function markAnswers(questionDiv, selectedValue) {
            const options = questionDiv.querySelectorAll('.option-div');
            options.forEach(option => {
                const correct = option.dataset.correct === 'true';
                if (correct) {
                    option.classList.add('bg-green-200', 'border-green-500');
                } else if (option.dataset.value === selectedValue) {
                    option.classList.add('bg-red-200', 'border-red-500');
                }
                option.style.pointerEvents = 'none'; // disable klik setelah jawaban
            });
        }

        function markUnanswered(questionDiv) {
            const options = questionDiv.querySelectorAll('.option-div');
            options.forEach(option => {
                if (option.dataset.correct === 'true') {
                    option.classList.add('bg-green-100', 'border-green-400');
                }
                option.style.pointerEvents = 'none';
            });
        }

        nextBtn.addEventListener('click', () => {
            if (currentIndex < questions.length - 1) {
                currentIndex++;
                showQuestion(currentIndex);
                progressBar.style.width = ((currentIndex) / totalQuestions * 100) + '%';
            }
        });

        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                showQuestion(currentIndex);
                progressBar.style.width = ((currentIndex) / totalQuestions * 100) + '%';
            }
        });

        // tampilkan soal pertama
        showQuestion(currentIndex);
        progressBar.style.width = '0%';
    </script>
</x-layout>
