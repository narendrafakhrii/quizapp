<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question; // import Question model
class QuizController extends Controller
{
    public function quiz()
    {
        // ambil semua soal beserta pilihan jawaban
        $questions = Question::with('options')->get();
        return view('quiz', compact('questions'));
    }
}
