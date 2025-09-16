<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SimulationAnswer extends Model
{
    protected $fillable = ['simulation_question_id', 'option', 'text', 'is_correct'];

    public function question()
    {
        return $this->belongsTo(SimulationQuestion::class);
    }
}
