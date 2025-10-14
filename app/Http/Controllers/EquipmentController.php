<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Studio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipment = Equipment::with('studios')->get()->map(function($item) {
            $usage = $item->getUsageStats();
            $item->usage_stats = $usage;
            return $item;
        });

        $studios = Studio::all();
        return view('admin.page.alatstudio', compact('equipment', 'studios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price_per_hours' => 'required|numeric|min:0', // Tambahan
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('equipment', 'public');
            $data['foto'] = $fotoPath;
        }

        $equipment = Equipment::create([
            'id' => $this->generateUniqueId(),
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'category' => $data['category'],
            'price_per_hours' => $data['price_per_hours'], // Tambahan
            'quantity' => $data['quantity'],
            'allocated_quantity' => 0,
            'foto' => $data['foto'] ?? null,
        ]);

        return redirect()->route('admin.equipment.index')
                         ->with('success', "Equipment '{$equipment->name}' berhasil ditambahkan dengan stock {$equipment->quantity} unit.");
    }

    /**
     * Get equipment data for editing via AJAX
     */
    public function getEditData($id)
    {
        $equipment = Equipment::findOrFail($id);

        return response()->json([
            'id' => $equipment->id,
            'name' => $equipment->name,
            'category' => $equipment->category,
            'description' => $equipment->description,
            'quantity' => $equipment->quantity,
            'allocated_quantity' => $equipment->allocated_quantity,
            'price_per_hours' => $equipment->price_per_hours, // Tambahan
            'foto' => $equipment->foto
        ]);
    }

    public function update(Request $request, $id)
    {
        $equipment = Equipment::with('studios')->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer|min:' . $equipment->allocated_quantity,
            'price_per_hours' => 'required|numeric|min:0', // Tambahan
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'quantity.min' => "Quantity minimal adalah {$equipment->allocated_quantity} (sudah teralokasi ke studio)"
        ]);

        $data = $request->only(['name', 'description', 'category', 'quantity', 'price_per_hours']); // Tambahan

        // Upload foto baru jika ada
        if ($request->hasFile('foto')) {
            if ($equipment->foto) {
                Storage::disk('public')->delete($equipment->foto);
            }
            $fotoPath = $request->file('foto')->store('equipment', 'public');
            $data['foto'] = $fotoPath;
        }

        $equipment->update($data);

        return redirect()->route('admin.equipment.index')
                         ->with('success', "Equipment '{$equipment->name}' berhasil diperbarui.");
    }

    public function destroy($id)
    {
        $equipment = Equipment::with('studios')->findOrFail($id);

        // Check if equipment is allocated to any studio
        if ($equipment->allocated_quantity > 0) {
            return redirect()->back()
                           ->withErrors(['error' => "Equipment '{$equipment->name}' tidak dapat dihapus karena sedang digunakan di {$equipment->studios()->count()} studio. Hapus dari studio terlebih dahulu."]);
        }

        // Hapus foto jika ada
        if ($equipment->foto) {
            Storage::disk('public')->delete($equipment->foto);
        }

        $equipmentName = $equipment->name;
        $equipment->delete();

        return redirect()->route('admin.equipment.index')
                         ->with('success', "Equipment '{$equipmentName}' berhasil dihapus.");
    }

    /**
     * Adjust stock for equipment
     */
    public function adjustStock(Request $request, $id)
    {
        $equipment = Equipment::findOrFail($id);

        $request->validate([
            'adjustment_type' => 'required|in:increase,decrease',
            'adjustment_quantity' => 'required|integer|min:1',
            'reason' => 'required|string|max:255'
        ]);

        $adjustmentQuantity = $request->adjustment_quantity;
        $oldQuantity = $equipment->quantity;

        if ($request->adjustment_type === 'increase') {
            $equipment->increment('quantity', $adjustmentQuantity);
            $message = "Stock {$equipment->name} ditambah {$adjustmentQuantity} unit";
        } else {
            // Decrease - ensure we don't go below allocated quantity
            $minQuantity = $equipment->allocated_quantity;
            $maxDecrease = $equipment->quantity - $minQuantity;

            if ($adjustmentQuantity > $maxDecrease) {
                return redirect()->back()
                               ->withErrors(['error' => "Tidak dapat mengurangi {$adjustmentQuantity} unit. Maksimal pengurangan: {$maxDecrease} unit (stock: {$equipment->quantity}, teralokasi: {$equipment->allocated_quantity})"]);
            }

            $equipment->decrement('quantity', $adjustmentQuantity);
            $message = "Stock {$equipment->name} dikurangi {$adjustmentQuantity} unit";
        }

        // Log the adjustment
        DB::table('equipment_adjustments')->insert([
            'equipment_id' => $equipment->id,
            'adjustment_type' => $request->adjustment_type,
            'quantity' => $adjustmentQuantity,
            'old_quantity' => $oldQuantity,
            'new_quantity' => $equipment->quantity,
            'reason' => $request->reason,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('admin.equipment.index')
                         ->with('success', $message . ". Alasan: {$request->reason}");
    }

    /**
     * Get equipment allocation details
     */
    public function getAllocationDetails($id)
    {
        $equipment = Equipment::with(['studios' => function($query) {
            $query->select('studios.id', 'studios.name', 'studios.type');
        }])->findOrFail($id);

        $allocations = $equipment->studios->map(function($studio) {
            return [
                'studio_id' => $studio->id,
                'studio_name' => $studio->name,
                'studio_type' => $studio->type,
                'quantity' => $studio->pivot->quantity,
                'allocated_at' => $studio->pivot->created_at
            ];
        });

        return response()->json([
            'equipment' => $equipment->only(['id', 'name', 'category', 'quantity', 'allocated_quantity']),
            'allocations' => $allocations,
            'available_stock' => $equipment->available_stock,
            'usage_stats' => $equipment->getUsageStats()
        ]);
    }

    private function generateUniqueId($length = 10)
    {
        do {
            $id = strtoupper(Str::random($length));
        } while (Equipment::where('id', $id)->exists());

        return $id;
    }
}
