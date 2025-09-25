<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearnAnswer extends Model
{
    protected $fillable = [
        'learn_question_id',  // id pertanyaan
        'answer_text',        // teks jawaban
        'is_correct',          // true jika jawaban benar
    ];

    /**
     * Relasi ke pertanyaan LearnQuestion
     */
    public function question()
    {
        return $this->belongsTo(LearnQuestion::class, 'learn_question_id');
    }
}
