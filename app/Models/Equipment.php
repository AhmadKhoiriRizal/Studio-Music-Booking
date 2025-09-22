<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipment';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'description',
        'category',
        'quantity',
        'allocated_quantity',
        'foto'
    ];

    protected $casts = [
        'quantity' => 'integer',
        'allocated_quantity' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Many-to-many relationship with Studio
     */
    public function studios()
    {
        return $this->belongsToMany(Studio::class, 'studio_equipment', 'equipment_id', 'studio_id')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    /**
     * One-to-many relationship with BookingEquipment
     */
    public function bookingEquipment()
    {
        return $this->hasMany(BookingEquipment::class, 'equipment_id', 'id');
    }

    /**
     * Scope for filtering by category
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Scope for available equipment (has available stock)
     */
    public function scopeAvailable($query)
    {
        return $query->whereRaw('quantity > allocated_quantity');
    }

    /**
     * Get available stock (not allocated to studios)
     */
    public function getAvailableStockAttribute()
    {
        return $this->quantity - $this->allocated_quantity;
    }

    /**
     * Check if equipment has available stock
     */
    public function hasAvailableStock($requestedQuantity = 1)
    {
        return $this->available_stock >= $requestedQuantity;
    }

    /**
     * Allocate quantity to studio
     */
    public function allocateStock($quantity)
    {
        if (!$this->hasAvailableStock($quantity)) {
            throw new \Exception("Insufficient stock. Available: {$this->available_stock}, Requested: {$quantity}");
        }

        $this->increment('allocated_quantity', $quantity);
        return $this;
    }

    /**
     * Deallocate quantity from studio
     */
    public function deallocateStock($quantity)
    {
        $this->decrement('allocated_quantity', $quantity);

        // Ensure allocated_quantity doesn't go below 0
        if ($this->allocated_quantity < 0) {
            $this->update(['allocated_quantity' => 0]);
        }

        return $this;
    }

    /**
     * Update allocation when studio equipment changes
     */
    public function updateAllocation($oldQuantity, $newQuantity)
    {
        $difference = $newQuantity - $oldQuantity;

        if ($difference > 0) {
            // Increasing allocation - check if we have enough stock
            $this->allocateStock($difference);
        } elseif ($difference < 0) {
            // Decreasing allocation - deallocate stock
            $this->deallocateStock(abs($difference));
        }

        return $this;
    }

    /**
     * Recalculate allocated quantity based on actual studio equipment
     */
    public function recalculateAllocation()
    {
        $totalAllocated = $this->studios()->sum('studio_equipment.quantity');
        $this->update(['allocated_quantity' => $totalAllocated]);
        return $this;
    }

    /**
     * Get equipment usage statistics
     */
    public function getUsageStats()
    {
        return [
            'total_quantity' => $this->quantity,
            'allocated_quantity' => $this->allocated_quantity,
            'available_quantity' => $this->available_stock,
            'allocation_percentage' => $this->quantity > 0 ? round(($this->allocated_quantity / $this->quantity) * 100, 2) : 0,
            'studios_count' => $this->studios()->count(),
        ];
    }
}
