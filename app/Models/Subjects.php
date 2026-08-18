<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Subjects extends Model
{
    use HasTranslations;

    public array $translatable = ['name']; // to know what the column will translate
    protected $guarded = [];

    public function grade() {
        return $this->belongsTo(Grades::class, 'grade_id');
    }
    public function classroom() {
        return $this->belongsTo(ClassRooms::class, 'classroom_id');
    }
        public function teachers() {
        return $this->belongsTo(Teachers::class, 'teacher_id');
    }
}