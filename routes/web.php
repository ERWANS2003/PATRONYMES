<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatronymeController;
use Illuminate\Support\Facades\Route;

// Page d’accueil = index des patronymes
Route::get('/', [PatronymeController::class, 'index'])->name('patronymes.index');

// CRUD complet pour patronymes
Route::resource('patronymes', PatronymeController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
