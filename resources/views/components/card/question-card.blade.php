@props(['question'])

<div class="bg-white p-6 rounded-2xl shadow-md space-y-6">
    {{-- gunakan question_text, bukan question --}}
    <h2 class="text-xl font-bold">{{ $question->question_text }}</h2>

    <div class="space-y-3">
        @foreach ($question->options as $option)
            <x-quiz.option-quiz :name="'q' . $question->id" :value="$option->option_text" :correct="$option->is_correct" />
        @endforeach

    </div>
</div>
