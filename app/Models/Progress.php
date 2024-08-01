<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'part_id',
        'course_id',
        'module_id',
        'lesson_id',
        'user_id',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function part()
    {
        return $this->belongsTo(Part::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
