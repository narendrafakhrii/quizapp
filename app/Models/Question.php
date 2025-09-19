<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question_text', 'level', 'category'];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    /**
     * Scope untuk filter berdasarkan level
     */
    public function scopeByLevel($query, $level)
    {
        return $query->where('level', $level);
    }

    /**
     * Scope untuk filter berdasarkan kategori
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
