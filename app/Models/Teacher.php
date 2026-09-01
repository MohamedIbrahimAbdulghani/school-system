<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Section;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasTranslations;
    public array $translatable = ['name'];
    public $guarded = [];

    public function gender() {
        return $this->belongsTo(Gender::class);
    }
    public function specialization() {
        return $this->belongsTo(Specialization::class);
    }
    // relationship between Teacher and Section to get Section in Teacher table
    public function sections() {
        return $this->belongsToMany(Section::class, 'teacher_section', 'teacher_id', 'section_id');
    }
}