<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SimulationQuestion;
use Illuminate\Support\Facades\Log;

class SimulationController extends Controller
{
    public function showSimulation()
    {
        // Ambil passage
        $passages = SimulationQuestion::where('type', 'passage')->orderBy('id')->get();

        // Ambil soal
        $questions = SimulationQuestion::where('type', '!=', 'passage')
            ->with('answers')
            ->orderBy('id')
            ->get();

        // Map ke format JSON-friendly untuk frontend
        $questionsJson = $questions->map(function ($q, $index) use ($passages) {
            $passageIndex = intdiv($index, 3); // tiap 3 soal satu passage
            $passage = $passages->get($passageIndex);

            return (object)[
                'id' => $q->id,
                'question' => $q->question ?? 'No question text',
                'type' => $q->type ?? 'multiple_choice',
                'passage_id' => $passage?->id,
                'passage_content' => json_encode($passage?->passage_content ?? []),
                'answers' => $q->answers->map(function ($a) {
                    return (object)[
                        'id' => $a->id,
                        'option' => $a->option ?? 'X',
                        'text' => $a->text ?? 'No answer text',
                    ];
                })->toArray(),
            ];
        });

        return view('simulation', compact('questionsJson'));
    }

    // Endpoint AJAX jika dibutuhkan
    public function getQuestion($id)
    {
        $questions = SimulationQuestion::where('type', '!=', 'passage')
            ->with('answers')
            ->orderBy('id')
            ->get();

        $questionIndex = $questions->pluck('id')->search($id);
        if ($questionIndex === false) return response()->json(['error' => 'Question not found'], 404);

        $question = $questions->get($questionIndex);
        $passages = SimulationQuestion::where('type', 'passage')->orderBy('id')->get();
        $passageIndex = intdiv($questionIndex, 3);
        $currentPassage = $passages->get($passageIndex);

        return response()->json([
            'question' => $question->load('answers'),
            'passage' => $currentPassage,
        ]);
    }
}
