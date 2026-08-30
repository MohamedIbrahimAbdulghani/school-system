<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Grades;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\Student;

class Section extends Model
{
    use HasTranslations;
    public array $translatable = ['name'];
    protected $guarded = [];

    public function grade() {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    // relationship between Classroom and Section to get class_name in Section table
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
    // relationship between Teacher and Section to get Teacher in Section table
    public function teachers() {
        return $this->belongsToMany(Teacher::class, 'teacher_section', 'section_id', 'teacher_id');
    }
    // relationship between Students and Section to get Students in Section table
    public function students()
    {
        return $this->hasMany(Student::class, 'section_id');
    }
}


