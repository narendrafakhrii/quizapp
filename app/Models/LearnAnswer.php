<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearnAnswer extends Model
{
    protected $fillable = ['learn_question_id', 'answer_text', 'is_correct'];

    public function question()
    {
        return $this->belongsTo(LearnQuestion::class);
    }
}
