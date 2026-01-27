<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Genders;
use App\Models\Specializations;

class Teachers extends Model
{
    use HasTranslations;
    public array $translatable = ['name'];
    public $guarded = [];

    public function section() {
        return $this->belongsToMany(Sections::class);
    }
    public function gender() {
        return $this->belongsTo(Genders::class);
    }
    public function specialization() {
        return $this->belongsTo(Specializations::class);
    }
}
