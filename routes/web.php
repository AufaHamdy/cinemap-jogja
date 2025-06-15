<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CinemaController;

// ✅ Route untuk halaman utama — pakai controller, tidak lagi pakai closure manual
Route::get('/', [CinemaController::class, 'index'])->name('home');

// ✅ Route daftar bioskop (jika ingin dipisah dari home, opsional)
Route::get('/cinemas', [CinemaController::class, 'index'])->name('cinema.index');

// ✅ Route detail bioskop
Route::get('/cinemas/{id}', [CinemaController::class, 'show'])->name('cinema.show');
