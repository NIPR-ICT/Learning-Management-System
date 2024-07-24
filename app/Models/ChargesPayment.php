<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChargesPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'charge_id',
        'amount',
        'program_id',
        'part_id',
        'user_id',
        'transaction_id'
    ];

    // Define relationships
    public function charge()
    {
        return $this->belongsTo(ExtraCharge::class, 'charge_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function part()
    {
        return $this->belongsTo(Part::class, 'part_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
