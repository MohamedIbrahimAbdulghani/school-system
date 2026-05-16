<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class promotion extends Model
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
        return $this->belongsTo(Students::class, 'student_id');
    }
    public function fromGrade() {
        return $this->belongsTo(Grades::class, 'from_grade');
    }
    public function fromClassroom() {
        return $this->belongsTo(ClassRooms::class, 'from_classroom');
    }
    public function fromSection() {
        return $this->belongsTo(Sections::class, 'from_section');
    }
    public function toGrade() {
        return $this->belongsTo(Grades::class, 'to_grade');
    }
    public function toClassroom() {
        return $this->belongsTo(ClassRooms::class, 'to_classroom');
    }
    public function toSection() {
        return $this->belongsTo(Sections::class, 'to_section');
    }
}