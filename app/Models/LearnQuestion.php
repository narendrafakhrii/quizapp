<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearnQuestion extends Model
{
    protected $fillable = [
        'learn_id',        // id slide quiz di table learns
        'question_text',    // teks pertanyaan
    ];

    /**
     * Relasi ke slide Learn
     */
    public function learn()
    {
        return $this->belongsTo(Learn::class);
    }

    /**
     * Relasi ke jawaban (answers)
     * Diurutkan berdasarkan id
     */
    public function answers()
    {
        return $this->hasMany(LearnAnswer::class)->orderBy('id');
    }
}
