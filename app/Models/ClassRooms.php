<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ClassRooms extends Model
{
    protected $guarded = [];

    use HasTranslations;

    public array $translatable = ['name_class']; // to know what the column will translate

    public function grade()
    {
        return $this->belongsTo(grades::class);
    }
}
