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
}
