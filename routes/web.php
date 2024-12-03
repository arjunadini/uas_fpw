<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [MahasiswaController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk menampilkan form input data mahasiswa (GET)
Route::get('/mahasiswa/form', [MahasiswaController::class, 'create'])->middleware('auth')->name('mahasiswa.mahasiswa');

// Route untuk menyimpan data mahasiswa (POST)
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->middleware('auth')->name('mahasiswa.store');

// Route untuk menghapus data mahasiswa
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

// Route Untuk mengeksport data ke Excel
Route::get('/mahasiswa/export/excel', [MahasiswaController::class, 'exportExcel'])->name('mahasiswa-export-excel');

// Route Untuk mengeksport data ke PDF
Route::get('/mahasiswa/export/pdf', [MahasiswaController::class, 'exportPdf'])->name('mahasiswa-export-pdf');

// Route untuk edit data mahasiswa
Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::put('/mahasiswa/update/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');

// Route untuk Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';