<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'student_id',
        'from_grade',
        'from_classroom',
        'from_section',
        'to_grade',
        'to_classroom',
        'to_section',
        'academic_year',
        'new_academic_year'
    ];

    public function student() {
        return $this->belongsTo(Student::class, 'student_id')->withTrashed();
    }
    public function fromGrade() {
        return $this->belongsTo(Grade::class, 'from_grade');
    }
    public function fromClassroom() {
        return $this->belongsTo(Classroom::class, 'from_classroom');
    }
    public function fromSection() {
        return $this->belongsTo(Section::class, 'from_section');
    }
    public function toGrade() {
        return $this->belongsTo(Grade::class, 'to_grade');
    }
    public function toClassroom() {
        return $this->belongsTo(Classroom::class, 'to_classroom');
    }
    public function toSection() {
        return $this->belongsTo(Section::class, 'to_section');
    }
}
