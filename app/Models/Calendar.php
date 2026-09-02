<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected  $guarded = [];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];
}