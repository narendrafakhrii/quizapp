<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SimulationQuestion extends Model
{
    protected $fillable = [
        'question',
        'type',
        'subject',
        'passage_id', // relasi ke tabel passages
    ];

    /**
     * Relasi ke passage
     */
    public function passage()
    {
        return $this->belongsTo(Passage::class, 'passage_id');
    }

    /**
     * Relasi ke jawaban
     */
    public function answers()
    {
        return $this->hasMany(SimulationAnswer::class, 'simulation_question_id');
    }
}
