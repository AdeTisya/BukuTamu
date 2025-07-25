<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuTamuController;

Route::get('/get-desa', [BukuTamuController::class, 'getDesa'])->name('get-desa');
Route::get('/buku-tamu', [BukuTamuController::class, 'index'])->name('buku-tamu.index');
Route::post('/buku-tamu', [BukuTamuController::class, 'store'])->name('buku-tamu.store');