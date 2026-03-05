<?php

namespace App\Models;

use App\Models\Home;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = [
        'profile_id',
        'label',
        'email',
        'phone',
        'address',
        'city',
        'country',
        'linkedin_url',
        'github_url',
        'website_url',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->belongsTo(Home::class, 'profile_id');
    }
}
