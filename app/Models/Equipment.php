<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'category',
        'quantity',
        'foto'
    ];

    // Relasi many-to-many ke studios melalui pivot table
    public function studios()
    {
        return $this->belongsToMany(Studio::class, 'studio_equipment')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_equipment')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}
