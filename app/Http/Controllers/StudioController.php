<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudioController extends Controller
{
    public function index()
    {
        return view('admin.page.datastudio');
    }

    public function create()
    {
        return view('admin.page.datastudio-create');
    }

    public function edit($id)
    {
        return view('admin.page.datastudio-edit', compact('id'));
    }

    public function availability()
    {
        return view('admin.page.ketersediaan');
    }
}
