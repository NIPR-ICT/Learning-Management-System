<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'user_id',
        'comment',
        'rating',
        'status',
        'instructor_id',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
