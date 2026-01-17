<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Genders extends Model
{
    use HasTranslations;
    public array $translatable = ['name'];
    public $guarded = [];
}
