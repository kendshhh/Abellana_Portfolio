<?php

namespace App\Models;

use App\Models\Home;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $fillable = [
        'profile_id',
        'degree',
        'field_of_study',
        'institution',
        'start_year',
        'end_year',
        'grade',
        'description',
        'sort_order',
    ];

    protected $casts = [
        'start_year' => 'integer',
        'end_year' => 'integer',
        'sort_order' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->belongsTo(Home::class, 'profile_id');
    }
}
