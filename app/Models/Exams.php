<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Exams extends Model
{
    use HasTranslations;

    public array $translatable = ['name']; // to know what the column will translate

    protected $guarded = [];
}
