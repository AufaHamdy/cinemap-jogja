<?php
use App\Http\Controllers\Api\CinemaController;

Route::prefix('cinemas')->group(function () {
    Route::get('/', [CinemaController::class, 'index']); // List with search & filter
    Route::get('/nearby', [CinemaController::class, 'nearby']); // Nearby search
    Route::get('/statistics', [CinemaController::class, 'statistics']); // Statistics
    Route::get('/{cinema}', [CinemaController::class, 'show']); // Detail by ID
});