<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'part_id',
        'percentage_discount',
        'code',
        'start_date',
        'end_date',
    ];

    public function part()
    {
        return $this->belongsTo(Part::class);
    }
}
