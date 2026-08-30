<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    protected $guarded = [];

    use HasTranslations;

    public array $translatable = ['name']; // to know what the column will translate

    // this is function to get section about grades ( Relationship {one to many} )
    public function sections() {
        return $this->hasMany(Section::class, 'grade_id');
    }


}

