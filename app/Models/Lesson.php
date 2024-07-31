<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'course_id',
        'title',
        'content',
        'order',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id', 'id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function progresses()
{
    return $this->hasMany(Progress::class);
}
}
