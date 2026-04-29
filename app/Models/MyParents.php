<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class MyParents extends Model
{
    use HasTranslations;
    public array $translatable = ['father_name', 'mother_name', 'father_job', 'mother_job'];
    protected $guarded = [];

    // Father relationships
    public function fatherNationality() {
        return $this->belongsTo(Nationalitie::class, 'father_nationality_id');
    }
    public function fatherBloodType() {
        return $this->belongsTo(TypeBloods::class, 'father_blood_type_id');
    }
    public function fatherReligion() {
        return $this->belongsTo(Religions::class, 'father_religion_id');
    }

    // Mother relationships
    public function motherNationality() {
        return $this->belongsTo(Nationalitie::class, 'mother_nationality_id');
    }
    public function motherBloodType() {
        return $this->belongsTo(TypeBloods::class, 'mother_blood_type_id');
    }
    public function motherReligion() {
        return $this->belongsTo(Religions::class, 'mother_religion_id');
    }
    // Relationship between Parents and images
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}