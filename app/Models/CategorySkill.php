<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySkill extends Model
{
    use HasFactory;

    protected $table = 'category_skills';
    protected $fillable = ['category_id', 'skill_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}
