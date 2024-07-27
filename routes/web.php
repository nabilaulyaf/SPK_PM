<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AspekController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PerhitunganController;

// authorization
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// home
Route::get('/home', function () {
    return view('home', ['pageName' => 'Home']);
})->name('home');

// pelamar
Route::get('/pelamar', [PelamarController::class, 'index'])->name('pelamar.index');
Route::get('/pelamar/add', [PelamarController::class, 'create'])->name('pelamar.create');
Route::post('/pelamar', [PelamarController::class, 'store'])->name('pelamar.store');
Route::get('/pelamar/edit/{id}', [PelamarController::class, 'edit'])->name('pelamar.edit');
Route::put('/pelamar/{id}', [PelamarController::class, 'update'])->name('pelamar.update');
Route::delete('/pelamar/{id}', [PelamarController::class, 'destroy'])->name('pelamar.destroy');

// aspek
Route::get('/aspek', [AspekController::class, 'index'])->name('aspek.index');

// kriteria
Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria.index');

// profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/profile/save', [ProfileController::class, 'save'])->name('profile.save');

// perhitungan
Route::get('/perhitungan', [PerhitunganController::class, 'index'])->name('perhitungan.index');
