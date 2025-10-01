<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnProgress extends Model
{
    use HasFactory;

    protected $table = 'learn_progress';

    protected $fillable = [
        'user_id',
        'learn_group',
        'progress',
    ];

    /**
     * Relasi ke user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke semua Learn dalam group
     */
    public function learns()
    {
        return $this->hasMany(Learn::class, 'learn_group', 'learn_group');
    }
}
