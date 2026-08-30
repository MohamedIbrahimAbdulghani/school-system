<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fee extends Model
{
    protected $guarded = [];

    use HasTranslations;

    public array $translatable = ['name'];

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
}