<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Part extends Model
{
    use HasFactory;
    protected $table = 'parts';
    protected $fillable = [
    'program_id', 
    'name', 
    'slug',
    'description',
    'max_credit',
    'min_credit',
    'program_duration',
];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'part_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'part_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($part) {
            if ($part->isDirty('name')) {
                $part->slug = Str::slug($part->name);
            }
        });
    }
}
