<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Grades;
use App\Models\ClassRooms;
use App\Models\Teachers;

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
    // relationship between Teacher and Section to get Teacher in Section table
    public function teachers() {
        return $this->belongsToMany(Teachers::class, 'teacher_section', 'section_id', 'teacher_id');
    }
}
