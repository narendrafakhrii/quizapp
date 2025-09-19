<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question; // import Question model
class QuizController extends Controller
{
    public function quiz($level = 'newbie', $category = 'grammar')
    {
        // Validasi level
        $validLevels = ['newbie', 'intermediate', 'expert'];
        if (!in_array($level, $validLevels)) {
            $level = 'newbie';
        }

        // Ambil soal berdasarkan level dan kategori
        $questions = Question::with('options')
            ->byLevel($level)
            ->byCategory($category)
            ->get();

        // Jika tidak ada soal, redirect dengan pesan
        if ($questions->isEmpty()) {
            return redirect()->route('level')->with('error', 'Belum ada soal untuk level ini.');
        }

        return view('quiz', compact('questions', 'level', 'category'));
    }
}
