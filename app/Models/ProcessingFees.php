<?php

namespace App\Models;
use App\Models\Students;
use Illuminate\Database\Eloquent\Model;

class ProcessingFees extends Model
{
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }
}
