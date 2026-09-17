<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected  $guarded = [];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    public function teacher()
    {
        return $this->belongsTo(\App\Models\Teacher::class);
    }

    public function section()
    {
        return $this->belongsTo(\App\Models\Section::class);
    }
}