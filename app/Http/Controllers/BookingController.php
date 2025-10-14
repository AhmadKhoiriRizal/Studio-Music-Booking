<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Studio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function availability()
    {
        return view('admin.page.ketersediaan');
    }

    public function index()
    {
        return view('user.booking.booking');
    }

    public function create(Request $request)
    {
        $studioId = $request->query('studio_id');
        $currentUser = auth()->user();

        if (!$studioId) {
            return redirect()->route('user.booking.index')
                ->with('error', 'Pilih studio terlebih dahulu');
        }

        $studio = Studio::with('equipment')->where('status', 'available')->find($studioId);

        if (!$studio) {
            return redirect()->route('user.booking.index')
                ->with('error', 'Studio tidak ditemukan atau tidak tersedia');
        }

        return view('user.booking.booking', compact('studio', 'currentUser'));
    }

    public function detail(Request $request)
    {
        $studioId = $request->query('studio_id');

        if (!$studioId) {
            return redirect()->route('user.booking.index')
                ->with('error', 'Studio tidak ditemukan');
        }

        $studio = Studio::with('equipment')->where('status', 'available')->find($studioId);

        if (!$studio) {
            return redirect()->route('user.booking.index')
                ->with('error', 'Studio tidak ditemukan atau tidak tersedia');
        }

        return view('user.booking.detail', compact('studio'));
    }

    public function riwayat()
    {
        return view('user.booking.riwayat');
    }

    // Method baru untuk equipment
    public function getEquipment(Request $request)
    {
        try {
            $equipment = Equipment::where('quantity', '>', DB::raw('allocated_quantity'))
                ->get()
                ->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'name' => $item->name,
                        'description' => $item->description,
                        'category' => $item->category,
                        'price_per_hours' => (float) $item->price_per_hours,
                        'quantity' => $item->quantity,
                        'allocated_quantity' => $item->allocated_quantity,
                        'foto' => $item->foto,
                        'available' => $item->quantity - $item->allocated_quantity
                    ];
                });

            $categories = Equipment::distinct()
                ->whereNotNull('category')
                ->pluck('category')
                ->toArray();

            return response()->json([
                'success' => true,
                'categories' => $categories,
                'equipment' => $equipment
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to load equipment data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getEquipmentCategories()
    {
        $categories = Equipment::distinct()
            ->whereNotNull('category')
            ->pluck('category')
            ->toArray();

        return response()->json([
            'success' => true,
            'categories' => $categories
        ]);
    }

    public function getEquipmentByCategory($category)
    {
        $equipment = Equipment::where('category', $category)
            ->where('quantity', '>', DB::raw('allocated_quantity'))
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'description' => $item->description,
                    'category' => $item->category,
                    'price_per_hours' => (float) $item->price_per_hours,
                    'quantity' => $item->quantity,
                    'allocated_quantity' => $item->allocated_quantity,
                    'foto' => $item->foto,
                    'available' => $item->quantity - $item->allocated_quantity
                ];
            });

        return response()->json([
            'success' => true,
            'equipment' => $equipment
        ]);
    }
}
