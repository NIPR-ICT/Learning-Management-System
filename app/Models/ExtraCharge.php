<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraCharge extends Model
{
    use HasFactory;
    protected $table = 'extra_charges';

    protected $fillable = [
        'item',
        'description',
        'amount',
        'part_id',
        'program_id',
    ];


    public function part()
    {
        return $this->belongsTo(Part::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    
}
