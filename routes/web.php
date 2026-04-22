<?php

/**
 * routes/web.php
 *
 * CHANGE: Replace the anonymous closure on GET '/' with ManhuaController@index.
 *
 * Why a dedicated controller instead of a closure?
 * — Closures can't be cached by `php artisan route:cache`, which is important
 *   for production performance. A named controller method is always cacheable.
 * — It keeps the route file clean and moves business logic where it belongs.
 */

use App\Http\Controllers\ManhuaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ── Public Routes ──────────────────────────────────────────────────────────────

/**
 * Manhua Homepage
 * Renders ManhuaHome.vue via Inertia with homepage data.
 */
Route::get('/', [ManhuaController::class, 'index'])->name('home');

// ── Authenticated Routes ───────────────────────────────────────────────────────

Route::get('/dashboard', function () {
    return inertia('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
