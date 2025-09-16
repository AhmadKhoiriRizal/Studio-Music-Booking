<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StudioController extends Controller
{
    public function index()
    {
        $studios = Studio::with('equipment')->get();
        $equipment = Equipment::all(); // Tambahkan ini
        return view('admin.page.datastudio', compact('studios', 'equipment'));
    }

    public function create()
    {
        $equipment = Equipment::all();
        return view('admin.studios.create', compact('equipment'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price_per_hour' => 'required|numeric|min:0',
            'min_booking_hours' => 'required|integer|min:1',
            'max_booking_hours' => 'required|integer|min:1',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'equipment' => 'nullable|array',
            'equipment.*.quantity' => 'nullable|integer|min:1',
        ]);

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
            'description' => $data['description'] ?? null,
            'foto' => $data['foto'] ?? null,
            'price_per_hour' => $data['price_per_hour'],
            'min_booking_hours' => $data['min_booking_hours'],
            'max_booking_hours' => $data['max_booking_hours'],
            'status' => $data['status'] ?? 'available',
        ]);

        // Sync equipment dengan quantity
        if ($request->has('equipment')) {
            $equipmentData = [];
            foreach ($request->equipment as $equipmentId => $equipmentItem) {
                if (!empty($equipmentItem['quantity']) && $equipmentItem['quantity'] > 0) {
                    $equipmentData[$equipmentId] = ['quantity' => $equipmentItem['quantity']];
                }
            }
            $studio->equipment()->sync($equipmentData);
        }

        return redirect()->route('admin.studio.index')
                         ->with('success', 'Studio berhasil dibuat dengan peralatan yang termasuk.');
    }

    public function edit($id)
    {
        $studio = Studio::with('equipment')->findOrFail($id);
        $equipment = Equipment::all();
        return view('admin.studios.edit', compact('studio', 'equipment'));
    }

    public function update(Request $request, $id)
    {
        $studio = Studio::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price_per_hour' => 'required|numeric|min:0',
            'min_booking_hours' => 'required|integer|min:1',
            'max_booking_hours' => 'required|integer|min:1',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'equipment' => 'nullable|array',
            'equipment.*.quantity' => 'nullable|integer|min:1',
        ]);

        $data = $request->all();

        // Upload foto baru jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($studio->foto) {
                Storage::disk('public')->delete($studio->foto);
            }

            $fotoPath = $request->file('foto')->store('studios', 'public');
            $data['foto'] = $fotoPath;
        }

        $studio->update($data);

        // Sync equipment dengan quantity
        $equipmentData = [];
        if ($request->has('equipment')) {
            foreach ($request->equipment as $equipmentId => $equipmentItem) {
                if (!empty($equipmentItem['quantity']) && $equipmentItem['quantity'] > 0) {
                    $equipmentData[$equipmentId] = ['quantity' => $equipmentItem['quantity']];
                }
            }
        }
        $studio->equipment()->sync($equipmentData);

        return redirect()->route('admin.studio.index')
                         ->with('success', 'Studio berhasil diperbarui dengan peralatan yang termasuk.');
    }

    public function destroy($id)
    {
        $studio = Studio::findOrFail($id);

        // Hapus foto jika ada
        if ($studio->foto) {
            Storage::disk('public')->delete($studio->foto);
        }

        // Hapus relasi equipment terlebih dahulu
        $studio->equipment()->detach();

        $studio->delete();

        return redirect()->route('admin.studio.index')
                         ->with('success', 'Studio berhasil dihapus.');
    }

    // Helper function untuk generate unique ID
    private function generateUniqueId($length = 10)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
