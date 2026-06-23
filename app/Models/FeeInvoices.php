<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeInvoices extends Model
{
    protected $guarded = [];
    public function grade() {
        return $this->belongsTo(Grades::class, 'grade_id');
    }
    public function classroom() {
        return $this->belongsTo(ClassRooms::class, 'classroom_id');
    }
    public function student() {
        return $this->belongsTo(Students::class, 'student_id');
    }
    public function fee() {
        return $this->belongsTo(Fees::class, 'fee_id');
    }
}
