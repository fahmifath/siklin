<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\JadwalDokterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('adminlte::page');
});

Route::resource('pasien', PasienController::class);
Route::resource('dokter', DokterController::class);
Route::resource('obat', ObatController::class);
Route::resource('kunjungan', KunjunganController::class);
Route::resource('resep', ResepController::class);
Route::resource('jadwal_dokter', JadwalDokterController::class);

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/obat/import', [ObatController::class, 'import'])->name('obat.import');

Route::get('/kunjungan_dokter', [DokterController::class, 'kunjungan5Hari'])->name('kunjungan.dokter');
