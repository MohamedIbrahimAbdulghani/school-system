<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class grades extends Model
{
    protected $guarded = [];

    use HasTranslations;

    public array $translatable = ['name']; // to know what the column will translate

    // this is to get the class rooms that are linked to the grade
    public function classRooms()
    {
        return $this->hasMany(ClassRooms::class, 'grade_id');
    }

}
