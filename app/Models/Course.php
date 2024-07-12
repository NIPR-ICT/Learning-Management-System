<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';

    protected $fillable = [
        'title',
        'description',
        'part_id',
        'program_id',
        'created_by',
        'course_category',
        'course_amount',
        'course_code',
        'cover_image',
        'credit_unit',
    ];

    /**
     * Get the program that owns the course.
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * Get the user who created the course.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function part()
    {
        return $this->belongsTo(Part::class, 'part_id');
    }

    public function modules()
    {
        return $this->hasMany(Module::class, 'course_id', 'id');
    }

    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Module::class, 'course_id', 'module_id');
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
