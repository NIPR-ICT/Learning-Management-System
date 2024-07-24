<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Program extends Model
{
    use HasFactory;
    protected $table = 'programs';

    // Define the fillable properties
    protected $fillable = [
        'title',
        'slug',
        'description',
        'created_by',
        'short_code',
        'cover_image',
        'accessing_order',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function courses()
{
    return $this->hasMany(Course::class);
}

public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
    

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($program) {
            if ($program->isDirty('title')) {
                $program->slug = Str::slug($program->title);
            }
        });
    }
}
