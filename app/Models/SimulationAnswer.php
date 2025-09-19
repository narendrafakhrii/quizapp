<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SimulationAnswer extends Model
{
    /**
     * Fillable attributes
     */
    protected $fillable = [
        'simulation_question_id',
        'option',   // A, B, C, D, E
        'text',     // Isi jawaban
        'is_correct', // Boolean
    ];

    /**
     * Cast is_correct ke boolean
     */
    protected $casts = [
        'is_correct' => 'boolean',
    ];

    /**
     * Relasi ke question
     */
    public function question()
    {
        return $this->belongsTo(SimulationQuestion::class, 'simulation_question_id');
    }

    /**
     * Helper untuk cek jawaban benar
     */
    public function isCorrect(): bool
    {
        return $this->is_correct;
    }
}
