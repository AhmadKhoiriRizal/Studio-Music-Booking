<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studio;
use App\Models\Equipment;

class UserController extends Controller
{
    public function home()
    {
        $studios = Studio::with('equipment')->where('status', 'available')->get();
        return view('user.dashboard', compact('studios'));
    }

    public function dashboard()
    {
        $studios = Studio::with('equipment')->where('status', 'available')->get();
        return view('user.dashboard', compact('studios'));
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function settings()
    {
        return view('user.settings');
    }
}
