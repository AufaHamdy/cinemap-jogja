<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    // Halaman daftar bioskop publik (Home / Welcome)
    public function index()
    {
        $cinemas = Cinema::where('is_active', true)->get();
        // Tampilkan ke welcome.blade.php
        return view('welcome', compact('cinemas'));
    }

    // Halaman detail bioskop
    public function show($id)
    {
        $cinema = Cinema::findOrFail($id);
        // Tampilkan ke cinemas/show.blade.php
        return view('cinemas.show', compact('cinema'));
    }
}
