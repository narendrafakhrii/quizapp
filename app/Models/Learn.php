<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Learn extends Model
{
    protected $fillable = [
        'title', 
        'slide_type', 
        'slide_number', 
        'content', 
        'learn_group'
    ];

    public function questions()
    {
        return $this->hasMany(LearnQuestion::class);
    }

    // Scope untuk mendapatkan slide berdasarkan group
    public function scopeByGroup($query, $group)
    {
        return $query->where('learn_group', $group)->orderBy('slide_number');
    }

    // Scope untuk mendapatkan hanya materi
    public function scopeMaterial($query)
    {
        return $query->where('slide_type', 'material');
    }

    // Scope untuk mendapatkan hanya quiz
    public function scopeQuiz($query)
    {
        return $query->where('slide_type', 'quiz');
    }

    // Method untuk mengecek apakah slide ini adalah materi
    public function isMaterial()
    {
        return $this->slide_type === 'material';
    }

    // Method untuk mengecek apakah slide ini adalah quiz
    public function isQuiz()
    {
        return $this->slide_type === 'quiz';
    }
}