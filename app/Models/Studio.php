<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

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

    protected $casts = [
        'price_per_hour' => 'decimal:2',
        'min_booking_hours' => 'integer',
        'max_booking_hours' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Many-to-many relationship with Equipment
     */
    public function equipment()
    {
        return $this->belongsToMany(Equipment::class, 'studio_equipment', 'studio_id', 'equipment_id')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    /**
     * One-to-many relationship with Booking
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'studio_id', 'id');
    }

    /**
     * Scope for available studios
     */
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    /**
     * Scope for filtering by type
     */
    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Get formatted price
     */
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price_per_hour, 0, ',', '.');
    }

    /**
     * Check if studio is available
     */
    public function isAvailable()
    {
        return $this->status === 'available';
    }

    /**
     * Get total equipment count
     */
    public function getTotalEquipmentAttribute()
    {
        return $this->equipment()->sum('quantity');
    }
}
