<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';

    protected $fillable = [
        'name',
        'level',
        'percent',
    ];

    protected $casts = [
        'percent' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
