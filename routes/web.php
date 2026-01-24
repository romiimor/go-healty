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

Route::resource('makanan', MakananController::class)->middleware('auth');

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');

use App\Http\Controllers\OlahragaController;

// Resource routes for olahraga (index, create, store, edit, update, destroy)
Route::resource('olahraga', OlahragaController::class)->middleware('auth');
use App\Http\Controllers\BMIController;

// Halaman BMI (menggunakan controller, memerlukan login)
Route::get('/BMI', [BMIController::class, 'index'])->middleware('auth')->name('bmi');

use App\Http\Controllers\ProfilController;

Route::get('/profil/edit', [ProfilController::class, 'edit'])->middleware('auth')->name('profil.edit');
Route::post('/profil/update', [ProfilController::class, 'update'])->middleware('auth')->name('profil.update');

use App\Http\Controllers\AboutController;

// Admin: edit About
Route::get('/admin/about/edit', [AboutController::class, 'edit'])->middleware('auth')->name('admin.about.edit');
Route::post('/admin/about/update', [AboutController::class, 'update'])->middleware('auth')->name('admin.about.update');

use App\Http\Controllers\RiwayatController;

Route::get('/riwayat', [RiwayatController::class, 'index'])->middleware('auth')->name('riwayat.index');
