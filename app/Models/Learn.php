<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Learn extends Model
{
    protected $fillable = ['title', 'content'];

    public function questions()
    {
        return $this->hasMany(LearnQuestion::class);
    }
}
