<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Studio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipment = Equipment::with('studios')->get(); // Eager load studios
        $studios = Studio::all();
        return view('admin.page.alatstudio', compact('equipment', 'studios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
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
            'quantity' => $data['quantity'],
            'foto' => $data['foto'] ?? null,
        ]);

        return redirect()->route('admin.equipment.index')
                         ->with('success', 'Alat berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $equipment = Equipment::findOrFail($id);

        // Hapus foto jika ada
        if ($equipment->foto) {
            Storage::disk('public')->delete($equipment->foto);
        }

        $equipment->delete();

        return redirect()->route('admin.equipment.index')
                         ->with('success', 'Alat berhasil dihapus.');
    }

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
