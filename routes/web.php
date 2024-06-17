<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\SuratController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan rute web untuk aplikasi Anda. Rute-rute
| ini dimuat oleh RouteServiceProvider dan semuanya akan diberi kelompok
| middleware "web". Buat sesuatu yang hebat!
|
*/

// Rute dengan middleware auth
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    #menampilkan keuangan
    Route::get('/keuangan', [KeuanganController::class, 'index'])->name('keuangan');
    
    #menampilkan form keuangan
    Route::get('/keuangan/create', [KeuanganController::class, 'create'])->name('keuangan.create');
    Route::post('/keuangan', [KeuanganController::class, 'store'])->name('keuangan.store');
    #menghapus keuangan
    Route::delete('/keuangan/{id}',[KeuanganController::class,'destroy'])->name('keuangan.destroy');


    Route::get('/program', [ProgramController::class, 'index'])->name('program');
    Route::get('/program/create', [ProgramController::class, 'create'])->name('program.create');
    Route::post('/program', [ProgramController::class, 'store'])->name('program.store');
    Route::delete('/program/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');
    
    Route::get('/inventaris', [InventarisController::class, 'index'])->name('inventaris');
    Route::get('/inventaris/create', [InventarisController::class, 'create'])->name('inventaris.create');
    Route::post('/inventaris', [InventarisController::class, 'store'])->name('inventaris.store');
    Route::delete('/inventaris/{id}', [InventarisController::class, 'destroy'])->name('inventaris.destroy');
    
    Route::get('/surat', [SuratController::class, 'index'])->name('surat');
    Route::get('/surat/create', [SuratController::class, 'create'])->name('surat.create');
    Route::post('/surat', [SuratController::class, 'store'])->name('surat.store');
    Route::delete('/surat/{id}', [SuratController::class, 'destroy'])->name('surat.destroy');
    
    Route::view('/tables', 'tables')->name('tables');
    Route::view('/wallet', 'wallet')->name('wallet');
    Route::view('/RTL', 'RTL')->name('RTL');
    Route::view('/profile', 'account-pages.profile')->name('profile');

    Route::get('/laravel-examples/user-profile', [ProfileController::class, 'index'])->name('users.profile');
    Route::put('/laravel-examples/user-profile/update', [ProfileController::class, 'update'])->name('users.update');
    Route::get('/laravel-examples/users-management', [UserController::class, 'index'])->name('users-management');

    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
    
    // Rute untuk organisasi
    Route::get('/organisasi/choose', [OrganisasiController::class, 'choose'])->name('organisasi.choose');
    Route::get('/organisasi/create', [OrganisasiController::class, 'create'])->name('organisasi.create');
    Route::post('/organisasi', [OrganisasiController::class, 'store'])->name('organisasi.store');
    Route::get('/organisasi/join', [OrganisasiController::class, 'joinForm'])->name('organisasi.join');
    Route::post('/organisasi/join', [OrganisasiController::class, 'join'])->name('organisasi.join.submit');
});

// Rute dengan middleware guest
Route::middleware('guest')->group(function () {
    Route::view('/signin', 'account-pages.signin')->name('signin');
    Route::view('/signup', 'account-pages.signup')->name('signup');

    Route::get('/sign-up', [RegisterController::class, 'create'])->name('sign-up');
    Route::post('/sign-up', [RegisterController::class, 'store']);
    Route::get('/sign-in', [LoginController::class, 'create'])->name('sign-in');
    Route::post('/sign-in', [LoginController::class, 'store']);

    Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'store']);
});
