<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Students;

class PaymentRefunds extends Model
{
    protected $guarded = [];

    public function student() {
        return $this->belongsTo(Students::class);
    }
}