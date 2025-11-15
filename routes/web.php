<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

// ----------------------------
// Halaman Utama
// ----------------------------
Route::get('/', [HomeController::class, 'index'])->name('home');

// ----------------------------
// Autentikasi
// ----------------------------
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Logout pakai POST (lebih aman)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ----------------------------
// Dashboard (hanya bisa diakses setelah login)
// ----------------------------
Route::get('/dashboard', function () {
    return view('dashboard'); 
})->middleware('auth')->name('dashboard');

use App\Http\Controllers\MakananController;

Route::resource('makanan', MakananController::class);

use App\Http\Controllers\OlahragaController;

Route::get('/olahraga', [OlahragaController::class, 'index'])->middleware('auth')->name('olahraga');

use App\Http\Controllers\ProfilController;

Route::get('/profil/edit', [ProfilController::class, 'edit'])->middleware('auth')->name('profil.edit');
Route::post('/profil/update', [ProfilController::class, 'update'])->middleware('auth')->name('profil.update');

use App\Http\Controllers\RiwayatController;

Route::get('/riwayat', [RiwayatController::class, 'index'])->middleware('auth')->name('riwayat.index');
