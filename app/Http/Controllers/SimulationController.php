<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SimulationQuestion;
use App\Models\Passage;

class SimulationController extends Controller
{
    public function showSimulation()
    {
        // Ambil semua soal (non-passage) beserta jawaban dan relasi passage
        $questions = SimulationQuestion::where('type', '!=', 'passage')
    ->with(['answers', 'passage']) // ambil relasi passage
    ->orderBy('id')
    ->get();

    $questionsJson = $questions->map(function ($q) {
    $passage = $q->passage; // relasi belongsTo ke Passage

    return (object)[
        'id' => $q->id,
        'question' => $q->question ?? 'No question text',
        'type' => $q->type ?? 'multiple_choice',
        'passage_id' => $passage?->id,
        'passage_content' => $passage?->content ?? [], // isi passage sebagai array
        'passage_type' => $passage?->type ?? null,     // tipe passage
        'answers' => $q->answers->map(function ($a) {
            return (object)[
                'id' => $a->id,
                'option' => $a->option ?? 'X',
                'text' => $a->text ?? 'No answer text',
            ];
        })->toArray(),
    ];
});




        return view('simulation.simulation', compact('questionsJson'));
    }

    // Endpoint AJAX jika dibutuhkan
    public function getQuestion($id)
    {
        $question = SimulationQuestion::with(['answers', 'passage'])
            ->findOrFail($id);

        return response()->json([
            'question' => $question,
            'passage' => $question->passage,
        ]);
    }
}
