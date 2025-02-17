<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'role',
        'image',
        'start_date',
        'end_date',
        'employment_type',
        'github_link',
        'live_link'
    ];

    // Relasi ke User (Many-to-One)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Skills (Many-to-Many)
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'project_skills');
    }
}
