<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class StudioController extends Controller
{
    public function index()
    {
        $studios = Studio::with('equipment')->get();
        $equipment = Equipment::available()->get(); // Hanya equipment dengan stock tersedia
        return view('admin.page.datastudio', compact('studios', 'equipment'));
    }

    public function create()
    {
        $equipment = Equipment::available()->get();
        return view('admin.studios.create', compact('equipment'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:small,medium,large,vip',
            'kapasitas' => 'required|string|max:255', // ✅ Tambahkan ini
            'price_per_hour' => 'required|numeric|min:0',
            'min_booking_hours' => 'required|integer|min:1',
            'max_booking_hours' => 'required|integer|min:1',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:available,maintenance',
            'equipment' => 'nullable|array',
            'equipment.*.quantity' => 'nullable|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            $data = $request->all();

            // Upload foto jika ada
            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('studios', 'public');
                $data['foto'] = $fotoPath;
            }

            // Buat studio
            $studio = Studio::create([
                'id' => $this->generateUniqueId(),
                'name' => $data['name'],
                'type' => $data['type'],
                'kapasitas' => $data['kapasitas'], // ✅ Tambahkan ini
                'description' => $data['description'] ?? null,
                'foto' => $data['foto'] ?? null,
                'price_per_hour' => $data['price_per_hour'],
                'min_booking_hours' => $data['min_booking_hours'],
                'max_booking_hours' => $data['max_booking_hours'],
                'status' => $data['status'],
            ]);

            // Process equipment dengan stock validation
            if ($request->has('equipment') && is_array($request->equipment)) {
                $equipmentData = [];
                $equipmentAllocations = []; // Track allocations for rollback if needed

                Log::info('Processing equipment data with stock validation', [
                    'studio_id' => $studio->id,
                    'equipment_input' => $request->equipment
                ]);

                foreach ($request->equipment as $equipmentId => $equipmentItem) {
                    if (!is_array($equipmentItem) || !isset($equipmentItem['quantity'])) {
                        Log::warning('Invalid equipment format', [
                            'equipment_id' => $equipmentId,
                            'equipment_item' => $equipmentItem
                        ]);
                        continue;
                    }

                    $quantity = intval($equipmentItem['quantity']);

                    if ($quantity > 0) {
                        $equipment = Equipment::find($equipmentId);

                        if (!$equipment) {
                            throw new \Exception("Equipment dengan ID {$equipmentId} tidak ditemukan");
                        }

                        // Check available stock
                        if (!$equipment->hasAvailableStock($quantity)) {
                            throw new \Exception("Stok {$equipment->name} tidak mencukupi. Tersedia: {$equipment->available_stock}, Diminta: {$quantity}");
                        }

                        // Allocate stock
                        $equipment->allocateStock($quantity);
                        $equipmentAllocations[] = ['equipment' => $equipment, 'quantity' => $quantity];

                        $equipmentData[$equipmentId] = ['quantity' => $quantity];

                        Log::info('Stock allocated', [
                            'equipment_id' => $equipmentId,
                            'equipment_name' => $equipment->name,
                            'allocated_quantity' => $quantity,
                            'remaining_stock' => $equipment->fresh()->available_stock
                        ]);
                    }
                }

                // Sync equipment to studio
                if (!empty($equipmentData)) {
                    $studio->equipment()->sync($equipmentData);

                    Log::info('Equipment sync successful with stock allocation', [
                        'studio_id' => $studio->id,
                        'synced_count' => count($equipmentData),
                        'allocations' => $equipmentAllocations
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('admin.studio.index')
                            ->with('success', "Studio '{$studio->name}' berhasil dibuat dengan {$studio->equipment()->count()} peralatan teralokasi.");

        } catch (\Exception $e) {
            DB::rollback();

            Log::error('Studio creation failed with stock allocation', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                            ->withInput()
                            ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
{
    $studio = Studio::with('equipment')->findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string|in:small,medium,large,vip',
        'kapasitas' => 'required|string|max:255',
        'price_per_hour' => 'required|numeric|min:0',
        'min_booking_hours' => 'required|integer|min:1',
        'max_booking_hours' => 'required|integer|min:1',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status' => 'required|in:available,maintenance',
        'equipment' => 'nullable|array',
        'equipment.*.quantity' => 'nullable|integer|min:1',
    ]);

    DB::beginTransaction();

    try {
        $data = $request->all();

        // Upload foto baru jika ada
        if ($request->hasFile('foto')) {
            if ($studio->foto) {
                Storage::disk('public')->delete($studio->foto);
            }
            $fotoPath = $request->file('foto')->store('studios', 'public');
            $data['foto'] = $fotoPath;
        } else {
            $data['foto'] = $studio->foto;
        }

        // Update studio
        $studio->update([
            'name' => $data['name'],
            'type' => $data['type'],
            'kapasitas' => $data['kapasitas'],
            'description' => $data['description'] ?? null,
            'foto' => $data['foto'],
            'price_per_hour' => $data['price_per_hour'],
            'min_booking_hours' => $data['min_booking_hours'],
            'max_booking_hours' => $data['max_booking_hours'],
            'status' => $data['status'],
        ]);

        // PERBAIKAN: Process equipment dengan cara yang lebih aman
        $currentEquipment = $studio->equipment->keyBy('id');
        $newEquipmentData = [];

        if ($request->has('equipment') && is_array($request->equipment)) {
            foreach ($request->equipment as $equipmentId => $equipmentItem) {
                if (!is_array($equipmentItem) || !isset($equipmentItem['quantity'])) {
                    continue;
                }

                $newQuantity = intval($equipmentItem['quantity']);

                if ($newQuantity > 0) {
                    $equipment = Equipment::find($equipmentId);

                    if (!$equipment) {
                        throw new \Exception("Equipment dengan ID {$equipmentId} tidak ditemukan");
                    }

                    $oldQuantity = $currentEquipment->has($equipmentId) ?
                        $currentEquipment[$equipmentId]->pivot->quantity : 0;

                    // Update stock allocation
                    if ($oldQuantity !== $newQuantity) {
                        try {
                            $equipment->updateAllocation($oldQuantity, $newQuantity);
                        } catch (\Exception $e) {
                            throw new \Exception("Error updating {$equipment->name}: " . $e->getMessage());
                        }
                    }

                    $newEquipmentData[$equipmentId] = ['quantity' => $newQuantity];

                    Log::info('Equipment allocation processed', [
                        'studio_id' => $studio->id,
                        'equipment_id' => $equipmentId,
                        'old_quantity' => $oldQuantity,
                        'new_quantity' => $newQuantity
                    ]);
                }
            }
        }

        // PERBAIKAN: Deallocate equipment yang dihapus
        foreach ($currentEquipment as $equipmentId => $equipment) {
            if (!isset($newEquipmentData[$equipmentId])) {
                $equipmentModel = Equipment::find($equipmentId);
                if ($equipmentModel) {
                    $oldQuantity = $equipment->pivot->quantity;
                    $equipmentModel->deallocateStock($oldQuantity);

                    Log::info('Equipment deallocated', [
                        'studio_id' => $studio->id,
                        'equipment_id' => $equipmentId,
                        'deallocated_quantity' => $oldQuantity
                    ]);
                }
            }
        }

        // PERBAIKAN: Gunakan syncWithoutDetaching atau detach manual
        // First, detach all existing equipment
        $studio->equipment()->detach();

        // Then, attach the new equipment with proper data
        if (!empty($newEquipmentData)) {
            foreach ($newEquipmentData as $equipmentId => $equipmentData) {
                $studio->equipment()->attach($equipmentId, [
                    'quantity' => $equipmentData['quantity'],
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        DB::commit();

        return redirect()->route('admin.studio.index')
                        ->with('success', "Studio '{$studio->name}' berhasil diperbarui.");

    } catch (\Exception $e) {
        DB::rollback();

        Log::error('Studio update failed', [
            'studio_id' => $id,
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
            'equipment_data' => $request->equipment ?? 'none'
        ]);

        return redirect()->back()
                        ->withInput()
                        ->withErrors(['error' => 'Gagal memperbarui studio: ' . $e->getMessage()]);
    }
}

    /**
 * Get studio data for editing via AJAX
 */
public function getEditData($id)
{
    $studio = Studio::with('equipment')->findOrFail($id);

    $equipmentData = $studio->equipment->mapWithKeys(function($item) {
        return [$item->id => ['quantity' => $item->pivot->quantity]];
    })->toArray();

    return response()->json([
        'id' => $studio->id,
        'name' => $studio->name,
        'type' => $studio->type,
        'kapasitas' => $studio->kapasitas,
        'description' => $studio->description,
        'price_per_hour' => $studio->price_per_hour,
        'min_booking_hours' => $studio->min_booking_hours,
        'max_booking_hours' => $studio->max_booking_hours,
        'status' => $studio->status,
        'foto' => $studio->foto,
        'equipment' => $equipmentData
    ]);
}

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $studio = Studio::with('equipment')->findOrFail($id);

            // Deallocate all equipment stock
            foreach ($studio->equipment as $equipment) {
                $equipmentModel = Equipment::find($equipment->id);
                if ($equipmentModel) {
                    $equipmentModel->deallocateStock($equipment->pivot->quantity);

                    Log::info('Stock deallocated on studio deletion', [
                        'studio_id' => $studio->id,
                        'equipment_id' => $equipment->id,
                        'deallocated_quantity' => $equipment->pivot->quantity,
                        'available_stock' => $equipmentModel->fresh()->available_stock
                    ]);
                }
            }

            // Hapus foto jika ada
            if ($studio->foto) {
                Storage::disk('public')->delete($studio->foto);
            }

            // Hapus relasi equipment
            $studio->equipment()->detach();
            $studio->delete();

            DB::commit();

            return redirect()->route('admin.studio.index')
                            ->with('success', "Studio '{$studio->name}' berhasil dihapus dan stock equipment telah dikembalikan.");

        } catch (\Exception $e) {
            DB::rollback();

            Log::error('Studio deletion failed', [
                'studio_id' => $id,
                'error' => $e->getMessage()
            ]);

            return redirect()->back()
                            ->withErrors(['error' => 'Gagal menghapus studio: ' . $e->getMessage()]);
        }
    }

    /**
 * AJAX endpoint to get equipment with stock info
 */
public function getEquipmentStock()
{
    try {
        $equipment = Equipment::select('id', 'name', 'category', 'quantity', 'allocated_quantity')
                              ->get()
                              ->map(function($item) {
                                  $allocated = $item->allocated_quantity ?? 0;
                                  $available = $item->quantity - $allocated;

                                  return [
                                      'id' => $item->id,
                                      'name' => $item->name,
                                      'category' => $item->category,
                                      'total_quantity' => $item->quantity,
                                      'allocated_quantity' => $allocated,
                                      'available_stock' => max(0, $available), // Pastikan tidak negatif
                                      'foto' => $item->foto ? asset('storage/' . $item->foto) : null
                                  ];
                              });

        return response()->json($equipment);
    } catch (\Exception $e) {
        \Log::error('Error fetching equipment stock: ' . $e->getMessage());
        return response()->json([
            'error' => 'Failed to load equipment stock data'
        ], 500);
    }
}

    /**
     * Check real-time equipment availability
     */
    public function checkEquipmentAvailability(Request $request)
    {
        $equipmentId = $request->equipment_id;
        $quantity = intval($request->quantity);
        $studioId = $request->studio_id; // For edit mode

        $equipment = Equipment::find($equipmentId);

        if (!$equipment) {
            return response()->json([
                'available' => false,
                'message' => 'Equipment tidak ditemukan'
            ], 404);
        }

        $availableStock = $equipment->available_stock;

        // If editing existing studio, add back current allocation
        if ($studioId) {
            $currentAllocation = DB::table('studio_equipment')
                                  ->where('studio_id', $studioId)
                                  ->where('equipment_id', $equipmentId)
                                  ->value('quantity') ?? 0;
            $availableStock += $currentAllocation;
        }

        $isAvailable = $quantity <= $availableStock;

        return response()->json([
            'available' => $isAvailable,
            'available_stock' => $availableStock,
            'requested_quantity' => $quantity,
            'total_stock' => $equipment->quantity,
            'allocated_stock' => $equipment->allocated_quantity,
            'message' => $isAvailable ?
                "Stock tersedia: {$availableStock}" :
                "Stock tidak mencukupi! Tersedia: {$availableStock}, Diminta: {$quantity}"
        ]);
    }

    /**
     * Recalculate all equipment allocations (utility function)
     */
    public function recalculateAllocations()
    {
        DB::beginTransaction();

        try {
            $equipmentList = Equipment::all();

            foreach ($equipmentList as $equipment) {
                $equipment->recalculateAllocation();
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Alokasi stock berhasil dikalkulasi ulang'
            ]);

        } catch (\Exception $e) {
            DB::rollback();

            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    private function generateUniqueId($length = 10)
    {
        do {
            $id = strtoupper(Str::random($length));
        } while (Studio::where('id', $id)->exists());

        return $id;
    }
}
