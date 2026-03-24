<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Students extends Model
{
    use HasTranslations;
    public array $translatable = ['name'];
    public $guarded = [];
    public function grade() {
        return $this->belongsTo(Grades::class, 'grade_id');
    }
    public function classroom() {
        return $this->belongsTo(ClassRooms::class, 'classroom_id');
    }
    public function section() {
        return $this->belongsTo(Sections::class, 'section_id');
    }
    public function parent() {
        return $this->belongsTo(MyParents::class, 'parent_id');
    }
}
