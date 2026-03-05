<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    protected $fillable = ['full_name', 'title', 'bio', 'email', 'location', 'image_url'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function educations()
    {
        return $this->hasMany(Education::class, 'profile_id');
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'profile_id');
    }
}
