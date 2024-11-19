<?php

use App\Http\Controllers\MarkerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/map', function () {
        $markers = \App\Models\Marker::all(); // Pastikan Model Marker sudah ada dan sudah diisi data
        return view('map', compact('markers'));
    })->name('map');
    Route::resource('markers', MarkerController::class);
    Route::get('/routing', [MapController::class, 'routing'])->name('routing');
});



require __DIR__ . '/auth.php';
