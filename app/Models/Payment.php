<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'booking_id',
        'merchant_ref',
        'payment_method',
        'reference',
        'amount',
        'status',
        'paid_at',
        'payment_url'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
