<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'type',
        'description',
        'foto',
        'price_per_hour',
        'min_booking_hours',
        'max_booking_hours',
        'status'
    ];

    // Relasi ke equipment melalui pivot table
    public function equipment()
    {
        return $this->belongsToMany(Equipment::class, 'studio_equipment')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // Helper method untuk mendapatkan equipment dengan quantity
    public function getEquipmentWithQuantity()
    {
        return $this->equipment->mapWithKeys(function ($item) {
            return [$item->id => $item->pivot->quantity];
        });
    }
}
