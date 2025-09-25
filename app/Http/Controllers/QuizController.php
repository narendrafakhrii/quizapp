<?php

namespace App\Http\Controllers;

use App\Models\QuizQuestion;

class QuizController extends Controller
{
    public function show($category)
    {
        $validCategories = ['grammar', 'vocabulary', 'reading'];
        if (! in_array($category, $validCategories)) {
            abort(404);
        }

        // Ambil 20 soal acak sesuai kategori
        $questions = QuizQuestion::with('answers')
            ->where('category', $category)
            ->inRandomOrder()
            ->take(20)
            ->get();

        // Transformasi data langsung di controller
        $quizData = $questions->map->toQuizFormat();

        return view('quiz.quiz-show', compact('category', 'quizData'));
    }
}
