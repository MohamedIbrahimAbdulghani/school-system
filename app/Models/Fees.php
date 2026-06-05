<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fees extends Model
{
    protected $guarded = [];

    use HasTranslations;

    public array $translatable = ['name'];

    public function grade()
    {
        return $this->belongsTo(Grades::class, 'grade_id');
    }
    public function classroom()
    {
        return $this->belongsTo(ClassRooms::class, 'classroom_id');
    }
    public function section() {
        return $this->belongsTo(Sections::class, 'section_id');
    }
}
