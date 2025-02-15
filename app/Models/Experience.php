<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'position',
        'company',
        'employment_type',
        'start_date',
        'end_date',
        'location',
        'description'
    ];

    // Relasi ke User (Many-to-One)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Skills (Many-to-Many)
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'experience_skills');
    }
}
