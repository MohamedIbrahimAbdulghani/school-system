<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use SoftDeletes;

    use HasTranslations;
    public array $translatable = ['name'];
    public $guarded = [];
    public function grade() {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
    public function classroom() {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
    public function section() {
        return $this->belongsTo(Section::class, 'section_id');
    }
    public function parent() {
        return $this->belongsTo(MyParent::class, 'parent_id');
    }
    public function gender() {
        return $this->belongsTo(Gender::class, 'gender_id');
    }
    public function nationality() {
        return $this->belongsTo(Nationality::class, 'nationality_id');
    }
    public function typeBlood() {
        return $this->belongsTo(TypeBlood::class, 'blood_type_id');
    }
    // Relationship between students and images ( Type this relationship is One to Many (Polymorphic) )
        public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    // Relationship between students and student_accounts to get debit and credit
    public function student_accounts() {
        return $this->hasMany(StudentAccount::class, 'student_id');
    }
    // Relationship between student and attendance
    public function attendance() {
        return $this->hasMany(Attendance::class, 'student_id');
    }
}