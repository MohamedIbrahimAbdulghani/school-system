<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Students;
use App\Models\Fee;

class ReceiptStudent extends Model
{
    protected $guarded = [];
    public function student()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }
    
}
