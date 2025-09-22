<?php

namespace App\Http\Controllers;

use App\Models\Learn;

class LearnController extends Controller
{
    // List semua grup learn (hanya 3 card)
    public function index()
    {
        // Ambil satu learn dari setiap grup untuk ditampilkan sebagai card
        $learns = Learn::select('learn_group', 'title')
            ->groupBy('learn_group', 'title')
            ->orderBy('learn_group')
            ->get()
            ->map(function ($learn) {
                // Hitung total slide per grup
                $totalSlides = Learn::where('learn_group', $learn->learn_group)->count();
                $learn->total_slides = $totalSlides;
                return $learn;
            });

        return view('learn', compact('learns'));
    }

    // Tampilkan semua slide dalam satu grup
    public function show($group)
    {
        // Ambil semua slide dalam grup ini, diurutkan berdasarkan slide_number
        $slides = Learn::byGroup($group)
            ->with(['questions.answers'])
            ->get();

        if ($slides->isEmpty()) {
            abort(404, 'Learn group not found');
        }

        // Ambil title dari slide pertama
        $title = $slides->first()->title;

        // Format data untuk frontend
        $slidesData = $slides->map(function ($slide) {
            $slideData = [
                'id' => $slide->id,
                'title' => $slide->title,
                'slide_type' => $slide->slide_type,
                'slide_number' => $slide->slide_number,
                'content' => $slide->content,
            ];

            // Jika ini quiz, tambahkan data pertanyaan
            if ($slide->isQuiz() && $slide->questions->isNotEmpty()) {
                $question = $slide->questions->first();
                $slideData['question'] = [
                    'id' => $question->id,
                    'question_text' => $question->question_text,
                    'answers' => $question->answers->map(function ($answer) {
                        return [
                            'id' => $answer->id,
                            'answer_text' => $answer->answer_text,
                            'is_correct' => (bool) $answer->is_correct,
                        ];
                    })->toArray(),
                ];
            }

            return $slideData;
        });

        return view('learn.learn-show', compact('slidesData', 'title', 'group'));
    }
}