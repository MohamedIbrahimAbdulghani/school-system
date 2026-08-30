<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{
    protected $guarded = [];

    use HasTranslations;

    public array $translatable = ['name_class']; // to know what the column will translate

    // this is to get the grade that is linked to the class room
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
}


