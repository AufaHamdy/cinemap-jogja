<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    // Halaman daftar bioskop publik (Home / Welcome)
    public function index()
    {
        $cinemas = Cinema::where('is_active', true)->paginate(4);
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
    public function nearby(Request $request)
{
    // Validasi input koordinat
    $request->validate([
        'lat' => 'required|numeric',
        'lng' => 'required|numeric',
    ]);

    $lat = $request->lat;
    $lng = $request->lng;

    // Haversine formula (Earth radius = 6371 km)
    $cinemas = Cinema::selectRaw("*,
        (6371 * acos(
            cos(radians(?)) *
            cos(radians(latitude)) *
            cos(radians(longitude) - radians(?)) +
            sin(radians(?)) *
            sin(radians(latitude))
        )) AS distance", [$lat, $lng, $lat])
        ->where('is_active', true)
        ->orderBy('distance', 'asc')
        ->get();

    return view('cinemas.nearby', compact('cinemas', 'lat', 'lng'));
}
}
