<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;
    protected $table = 'parts';
    protected $fillable = [
    'program_id', 
    'name', 
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
}
