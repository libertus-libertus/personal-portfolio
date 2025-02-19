<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'icon'
    ];

    // Relasi ke Skill Category (Many-to-Many)
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_skills');
    }

    // Relasi ke Project (Many-to-Many)
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_skills', 'project_id', 'skill_id');
    }

    // Relasi ke Experience (Many-to-Many)
    public function experiences()
    {
        return $this->belongsToMany(Experience::class, 'experience_skills');
    }
}
