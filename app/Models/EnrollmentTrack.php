<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollmentTrack extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'part_id',
        'user_id',
        'status',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function part()
    {
        return $this->belongsTo(Part::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
