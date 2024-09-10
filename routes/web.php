<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Models\Artikel;



Route::get('/', function () {
    $artikels = Artikel::all();
    return view('welcome', ['artikels' => $artikels]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('pegawai', PegawaiController::class);
    Route::resource('jabatan', JabatanController::class);
    Route::resource('artikels', ArtikelController::class);
});

Route::get('artikels/{artikel}', [ArtikelController::class, 'show'])->name('artikels.show');

