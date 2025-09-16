<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SimulationQuestion extends Model
{
    protected $fillable = [
        'question', 
        'type', 
        'subject', 
        'passage_content'
    ];

    protected $casts = [
        'passage_content' => 'array',
    ];

    public function answers()
    {
        return $this->hasMany(SimulationAnswer::class, 'simulation_question_id');
    }
}