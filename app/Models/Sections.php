<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Sections extends Model
{
    use HasTranslations;
    public array $translatable = ['name'];
    protected $guarded = [];

    public function grade() {
        return $this->belongsTo(Grades::class, 'grade_id');
    }

    // relationship between Classroom and Section to get class_name in Section table
    public function classroom()
    {
        return $this->belongsTo(ClassRooms::class, 'classroom_id');
    }
    public function teacher() {
        return $this->belongsToMany(Teachers::class);
    }
}
