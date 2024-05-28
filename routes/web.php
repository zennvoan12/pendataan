<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
        'title' => 'Halaman Home Page',
    ]);
});

Route::get('/about', [AboutController::class, 'index']);

Route::get('/berita', [ActivityController::class, 'index']);

Route::get('/alumni', [AlumniController::class, 'index']);

Route::get('/galeri', [GaleryController::class, 'index'])->name('galeri');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
