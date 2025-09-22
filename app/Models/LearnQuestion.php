<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearnQuestion extends Model
{
    protected $fillable = ['learn_id', 'question_text'];

    public function learn()
    {
        return $this->belongsTo(Learn::class);
    }

    public function answers()
    {
        return $this->hasMany(LearnAnswer::class)->orderBy('id');
    }
}
