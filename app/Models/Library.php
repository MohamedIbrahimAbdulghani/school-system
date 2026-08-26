<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $table = 'library';
    protected $guarded = [];

    public function grade()
    {
        return $this->belongsTo(Grades::class, 'grade_id');
    }
    public function classroom()
    {
        return $this->belongsTo(ClassRooms::class, 'classroom_id');
    }
    public function section()
    {
        return $this->belongsTo(Sections::class, 'section_id');
    }
    public function teacher() {
        return $this->belongsTo(Teachers::class, 'teacher_id');
    }
}