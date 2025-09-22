<?php

namespace App\Http\Controllers;

use App\Models\Learn;

class LearnController extends Controller
{
    // List semua materi
    public function index()
    {
        $learns = Learn::all();
        return view('learn', compact('learns'));
    }

    // Tampilkan materi + kuis
    public function show($id)
    {
        $learn = Learn::with('questions.answers')->findOrFail($id);

        // Ubah struktur supaya JS mengharapkan "options"
        $learn->questions->transform(function ($q) {
            return [
                'id' => $q->id,
                'question_text' => $q->question_text,
                'options' => $q->answers->map(function ($a) {
                    return [
                        'answer_text' => $a->answer_text,
                        'is_correct' => (bool)$a->is_correct,
                    ];
                }),
            ];
        });

        return view('learn.learn-show', compact('learn'));
    }
}
