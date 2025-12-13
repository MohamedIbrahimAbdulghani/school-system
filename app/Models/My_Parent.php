<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class My_Parent extends Model
{
    public $table = 'my_parents';
    use HasTranslations;
    public array $translatable = ['father_name', 'mother_name', 'father_job', 'mother_job'];
    protected $guarded = [];
}
