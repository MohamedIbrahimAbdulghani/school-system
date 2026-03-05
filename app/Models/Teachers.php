<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Genders;
use App\Models\Specializations;
use App\Models\Sections;

class Teachers extends Model
{
    use HasTranslations;
    public array $translatable = ['name'];
    public $guarded = [];

    public function gender() {
        return $this->belongsTo(Genders::class);
    }
    public function specialization() {
        return $this->belongsTo(Specializations::class);
    }
    // relationship between Teacher and Section to get Section in Teacher table
    public function sections() {
        return $this->belongsToMany(Sections::class, 'teacher_section', 'teacher_id', 'section_id');
    } 
}
