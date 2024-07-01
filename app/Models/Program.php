<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = 'programs';

    // Define the fillable properties
    protected $fillable = [
        'title',
        'description',
        'max_credit',
        'min_credit',
        'created_by',
        'program_duration',
        'short_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function courses()
{
    return $this->hasMany(Course::class);
}
}