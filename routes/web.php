<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $role = auth()->user()->role;
    if ($role === 'admin_tu') {
        return view('admin.queue');
    } elseif ($role === 'principal') {
        return view('principal.approval');
    }
    return view('applicant.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tickets/create', function () {
    return view('applicant.wizard');
})->middleware(['auth'])->name('tickets.create');

Route::post('/tickets/submit', [\App\Http\Controllers\TicketController::class, 'submit'])->middleware(['auth'])->name('tickets.submit');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
