<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question; // <- import model di sini

class QuizController extends Controller
{
    public function index()
    {
        // ambil semua soal beserta pilihan jawaban
        $questions = Question::with('options')->get();
        return view('quiz', compact('questions'));
    }
}
