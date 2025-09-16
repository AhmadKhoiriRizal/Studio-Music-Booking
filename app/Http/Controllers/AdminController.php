<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function index()
    {
        $users = User::all();
        // Ambil unique roles dari users
        $roles = User::select('role')->distinct()->pluck('role');

        // Definisikan statuses yang available
        $statuses = ['aktif', 'non-aktif']; // Sesuaikan dengan data Anda
        return view('admin.page.dataakun', compact('users', 'roles', 'statuses'));
    }

    public function create()
    {
        return view('admin.page.datastudio-create');
    }

    public function edit($id)
    {
        // Cek jika user adalah ADMIN@123 dan role admin
        $user = User::findOrFail($id);

        if ($user->id === 'ADMIN@123' && $user->role === 'admin') {
            return redirect()->route('admin.akun.index')
                ->with('error', 'Admin utama tidak dapat diedit');
        }

        return view('admin.page.datastudio-edit', compact('id', 'user'));
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            // Cek jika user adalah ADMIN@123 (tidak boleh dihapus)
            if ($user->id === 'ADMIN@123') {
                if (request()->ajax()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Admin utama tidak dapat dihapus'
                    ], 403);
                }
                return redirect()->route('admin.akun.index')
                    ->with('error', 'Admin utama tidak dapat dihapus');
            }

            // Cek jika user adalah admin lain (tidak boleh dihapus)
            if ($user->role === 'admin') {
                if (request()->ajax()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Admin tidak dapat dihapus'
                    ], 403);
                }
                return redirect()->route('admin.akun.index')
                    ->with('error', 'Admin tidak dapat dihapus');
            }

            $user->delete();

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'User berhasil dihapus'
                ]);
            }

            return redirect()->route('admin.akun.index')
                ->with('success', 'User berhasil dihapus');

        } catch (\Exception $e) {
            Log::error('Error deleting user: ' . $e->getMessage());

            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->route('admin.akun.index')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroyMultiple(Request $request)
{
    try {
        \Log::info('Multiple delete request received', [
            'all_request_data' => $request->all(),
            'user_ids_input' => $request->input('user_ids'),
            'content_type' => $request->header('Content-Type'),
            'method' => $request->method()
        ]);

        // Handle JSON string from form data
        $userIdsJson = $request->input('user_ids', '[]');
        $userIds = json_decode($userIdsJson, true) ?? [];

        \Log::info('Parsed user IDs:', ['user_ids' => $userIds]);

        if (empty($userIds)) {
            \Log::warning('No user IDs provided for deletion');
            return redirect()->route('admin.akun.index')
                ->with('error', 'Tidak ada user yang dipilih untuk dihapus');
        }

        // Filter out users that cannot be deleted (non-admin users only)
        $usersToDelete = User::whereIn('id', $userIds)
            ->where('id', '!=', 'ADMIN@123') // Protect specific admin
            ->where('role', '!=', 'admin')    // Protect all admins
            ->get();

        \Log::info('Users that can be deleted:', [
            'count' => $usersToDelete->count(),
            'user_ids' => $usersToDelete->pluck('id')
        ]);

        $deletedCount = 0;
        $skippedCount = 0;

        foreach ($usersToDelete as $user) {
            try {
                $user->delete();
                $deletedCount++;
                \Log::info("User deleted successfully: {$user->id}");
            } catch (\Exception $e) {
                \Log::error("Error deleting user {$user->id}: " . $e->getMessage());
                $skippedCount++;
            }
        }

        // Prepare response message
        if ($deletedCount > 0) {
            $message = "{$deletedCount} user berhasil dihapus";
            if ($skippedCount > 0) {
                $message .= ", {$skippedCount} user gagal dihapus";
            }

            return redirect()->route('admin.akun.index')
                ->with('success', $message);
        } else {
            $totalSkipped = count($userIds) - $deletedCount;
            return redirect()->route('admin.akun.index')
                ->with('error', "Tidak ada user yang dapat dihapus. {$totalSkipped} user adalah admin atau tidak ditemukan.");
        }

    } catch (\Exception $e) {
        \Log::error('Error in destroyMultiple: ' . $e->getMessage(), [
            'trace' => $e->getTraceAsString(),
            'request_data' => $request->all()
        ]);

        return redirect()->route('admin.akun.index')
            ->with('error', 'Terjadi kesalahan server: ' . $e->getMessage());
    }
}

// AdminController.php
// public function testDelete()
// {
//     $userIds = ['hOjSbsS8Fw', 'N8uyeGpxfz']; // Ganti dengan ID yang valid

//     try {
//         $result = User::whereIn('id', $userIds)->delete();
//         return response()->json(['success' => true, 'deleted' => $result]);
//     } catch (\Exception $e) {
//         return response()->json(['success' => false, 'error' => $e->getMessage()]);
//     }
// }

}
