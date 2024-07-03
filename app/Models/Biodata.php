<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;
    protected $table = 'biodata';
    protected $fillable = [
        'user_id',
        'date_of_birth',
        'gender',
        'nationality', 
        'marital_status',
        'phone_number', 
        'state', 
        'address',  
        'highest_qualification', 
        'major_field_of_study',
        'practice_no',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
