<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    protected $table = 'quiz_questions';

    protected $fillable = ['category', 'text', 'options', 'answer'];

    public function answers()
    {
        return $this->hasMany(QuizAnswer::class, 'question_id');
    }

    // Method untuk format data agar siap dipakai di Alpine.js
    public function toQuizFormat()
    {
        return [
            'question_text' => $this->text,
            'options' => $this->answers->map(function ($a) {
                return [
                    'option_text' => $a->text,
                    'is_correct' => (bool) $a->is_correct,
                    'visible' => true,
                ];
            })->toArray(),
        ];
    }
}
