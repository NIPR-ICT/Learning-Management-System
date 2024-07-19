<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function course(){
        return $this->belongsTo(Course::class, 'course_id' ,'id');
    }
    public function modules()
    {
        return $this->hasMany(Module::class, 'course_id', 'id');
    }
}
