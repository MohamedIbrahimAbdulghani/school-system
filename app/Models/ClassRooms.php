<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassRooms extends Model
{
    protected $guarded = [];

    // this function to make one to many relationship between grades and classroom
    public function grades() {
        return $this->belongsTo(grades::class);
    }
}
