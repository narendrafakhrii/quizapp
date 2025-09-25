<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Learn extends Model
{
    protected $fillable = [
        'title',
        'slide_type',      // 'material' atau 'quiz'
        'slide_number',    // urutan slide
        'content',         // isi materi jika material
        'learn_group',      // kategori: grammar, synonym, reference, paraphrase
    ];

    /**
     * Relasi ke pertanyaan (hanya untuk slide quiz)
     */
    public function questions()
    {
        return $this->hasMany(LearnQuestion::class);
    }

    /**
     * Scope: ambil semua slide dari group tertentu, urut berdasarkan slide_number
     */
    public function scopeByGroup($query, $group)
    {
        return $query->where('learn_group', $group)
            ->orderBy('slide_number');
    }

    /**
     * Scope: hanya materi
     */
    public function scopeMaterial($query)
    {
        return $query->where('slide_type', 'material');
    }

    /**
     * Scope: hanya quiz
     */
    public function scopeQuiz($query)
    {
        return $query->where('slide_type', 'quiz');
    }

    /**
     * Cek tipe slide
     */
    public function isMaterial(): bool
    {
        return $this->slide_type === 'material';
    }

    public function isQuiz(): bool
    {
        return $this->slide_type === 'quiz';
    }

    /**
     * Ambil slide berikutnya di group yang sama
     */
    public function nextSlide()
    {
        return self::byGroup($this->learn_group)
            ->where('slide_number', '>', $this->slide_number)
            ->orderBy('slide_number')
            ->first();
    }

    /**
     * Ambil slide sebelumnya di group yang sama
     */
    public function previousSlide()
    {
        return self::byGroup($this->learn_group)
            ->where('slide_number', '<', $this->slide_number)
            ->orderByDesc('slide_number')
            ->first();
    }
}
