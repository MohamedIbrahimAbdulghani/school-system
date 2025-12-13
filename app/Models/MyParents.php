<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class MyParents extends Model
{
    use HasTranslations;
    public array $translatable = ['father_name', 'mother_name', 'father_job', 'mother_job'];
    protected $guarded = [];
    
}
