<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnlineClasses extends Model
{
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
    public function user() {
        return $this->belongsTo(User::class, 'users_id');
    }
}
