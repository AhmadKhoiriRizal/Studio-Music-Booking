<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        return view('user.booking.booking');
    }

    public function create()
    {
        return view('user.booking.create');
    }

    public function detail()
    {
        return view('user.booking.detail');
    }

    public function riwayat()
    {
        return view('user.booking.riwayat');
    }
}
