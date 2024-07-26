<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function blogs()
    {
        return $this->hasMany(Blog::class);
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
