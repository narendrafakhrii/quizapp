<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SimulationQuestion extends Model
{
    /**
     * ============================
     * Tipe soal
     * ============================
     */
    const TYPE_OPTION   = 'option';   // Single choice (1 jawaban benar)
    const TYPE_MULTIPLE = 'multiple'; // Multiple choice (lebih dari 1 jawaban benar)
    const TYPE_FILL     = 'fill';     // Isian
    const TYPE_MATCHING = 'matching'; // Menjodohkan

    /**
     * ============================
     * Fillable attributes
     * ============================
     */
    protected $fillable = [
        'question',
        'type',
        'subject',
        'passage_id', // relasi ke tabel passages
    ];

    /**
     * ============================
     * Relasi ke passage
     * ============================
     */
    public function passage()
    {
        return $this->belongsTo(Passage::class, 'passage_id');
    }

    /**
     * ============================
     * Relasi ke jawaban
     * ============================
     */
    public function answers()
    {
        return $this->hasMany(SimulationAnswer::class, 'simulation_question_id');
    }

    /**
     * ============================
     * Helper untuk tipe soal
     * ============================
     */
    public function isSingleChoice(): bool
    {
        return $this->type === self::TYPE_OPTION;
    }

    public function isMultipleChoice(): bool
    {
        return $this->type === self::TYPE_MULTIPLE;
    }

    public function isFill(): bool
    {
        return $this->type === self::TYPE_FILL;
    }

    public function isMatching(): bool
    {
        return $this->type === self::TYPE_MATCHING;
    }

    /**
     * ============================
     * Ambil jawaban benar
     * ============================
     */
    public function correctAnswers()
    {
        return $this->answers()->where('is_correct', true)->get();
    }

    /**
     * ============================
     * Validasi jawaban user
     * ============================
     * $userAnswers = array atau string tergantung tipe soal
     */
    public function checkAnswer($userAnswers): bool
    {
        if ($this->isSingleChoice()) {
            return $this->answers()->where('option', $userAnswers)->value('is_correct') ?? false;
        }

        if ($this->isMultipleChoice()) {
            $correctOptions = $this->answers()->where('is_correct', true)->pluck('option')->toArray();
            return empty(array_diff($correctOptions, $userAnswers)) && empty(array_diff($userAnswers, $correctOptions));
        }

        // Untuk tipe lain bisa ditambah sesuai kebutuhan
        return false;
    }
}
