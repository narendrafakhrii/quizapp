<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passage extends Model
{
    protected $fillable = [
        'title',    // Judul passage
        'type',     // Tipe: paragraph, table, two_text, dll
        'content',  // Konten JSON
        'subject',  // Mapel, misal English
    ];

    protected $casts = [
        'content' => 'array', // otomatis decode JSON ke array
    ];

    /**
     * Relasi ke questions
     * Satu passage bisa memiliki banyak pertanyaan
     */
    public function questions()
    {
        // Pastikan foreign key 'passage_id' ada di tabel SimulationQuestion
        return $this->hasMany(SimulationQuestion::class, 'passage_id');
    }
}
