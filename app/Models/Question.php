<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function quizz() {
        return $this->belongsTo(Quizz::class, 'quizz_id');
    }
}
