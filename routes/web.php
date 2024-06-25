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

Route::middleware('auth')->group(function () {
    // Rute untuk organisasi
    Route::get('/organisasi/choose', [OrganisasiController::class, 'choose'])->name('organisasi.choose');
    
    // Organisasi
    Route::get('/organisasi-profile', [OrganisasiController::class, 'index'])->name('organisasi-profile');
    Route::get('/organisasi/{id}/edit', [OrganisasiController::class, 'edit'])->name('organisasi.edit');
    Route::put('/organisasi/{id}/update', [OrganisasiController::class, 'update'])->name('organisasi.update');
    
    // Membuat Organisasi
    Route::get('/organisasi/create', [OrganisasiController::class, 'create'])->name('organisasi.create');
    Route::post('/organisasi', [OrganisasiController::class, 'store'])->name('organisasi.store');

    // Mengisi Divisi setelah Membuat Organisasi
    Route::get('/organisasi/{organisasi}/create-divisi', [OrganisasiController::class, 'createDivisi'])->name('organisasi.create-divisi');
    Route::post('/organisasi/{organisasi}/store-divisi', [OrganisasiController::class, 'storeDivisi'])->name('organisasi.store-divisi');

    // Memilih Role dan Divisi Role
    Route::get('/organisasi/{organisasi}/choose-role', [OrganisasiController::class, 'chooseRole'])->name('organisasi.choose-role');
    Route::post('/organisasi/{organisasi}/store-role', [OrganisasiController::class, 'storeRole'])->name('organisasi.store-role');

    // Join Organisasi menggunakan Kode
    Route::get('/organisasi/join', [OrganisasiController::class, 'joinForm'])->name('organisasi.joinForm');
    Route::post('/organisasi/join', [OrganisasiController::class, 'join'])->name('organisasi.join');
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Keuangan
    Route::get('/keuangan', [KeuanganController::class, 'index'])->name('keuangan');
    Route::get('/keuangan/create', [KeuanganController::class, 'create'])->name('keuangan.create');
    Route::post('/keuangan', [KeuanganController::class, 'store'])->name('keuangan.store');
    Route::delete('/keuangan/{id}', [KeuanganController::class, 'destroy'])->name('keuangan.destroy');

    // Program
    Route::get('/program', [ProgramController::class, 'index'])->name('program');
    Route::get('/program/create', [ProgramController::class, 'create'])->name('program.create');
    Route::post('/program', [ProgramController::class, 'store'])->name('program.store');
    Route::get('/program/{id}/edit', [ProgramController::class, 'edit'])->name('program.edit');
    Route::put('/program/{id}', [ProgramController::class, 'update'])->name('program.update');
    Route::delete('/program/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');

    // Inventaris
    Route::get('/inventaris', [InventarisController::class, 'index'])->name('inventaris');
    Route::get('/inventaris/create', [InventarisController::class, 'create'])->name('inventaris.create');
    Route::post('/inventaris', [InventarisController::class, 'store'])->name('inventaris.store');
    Route::get('/inventaris/{id}/edit', [InventarisController::class, 'edit'])->name('inventaris.edit');
    Route::put('/inventaris/{id}', [InventarisController::class, 'update'])->name('inventaris.update');
    Route::delete('/inventaris/{id}', [InventarisController::class, 'destroy'])->name('inventaris.destroy');

    // Surat
    Route::get('/surat', [SuratController::class, 'index'])->name('surat');
    Route::get('/surat/create', [SuratController::class, 'create'])->name('surat.create');
    Route::post('/surat', [SuratController::class, 'store'])->name('surat.store');
    Route::get('/surat/{id}/edit', [SuratController::class, 'edit'])->name('surat.edit');
    Route::put('/surat/{id}', [SuratController::class, 'update'])->name('surat.update');
    Route::delete('/surat/{id}', [SuratController::class, 'destroy'])->name('surat.destroy');

    // Routes lainnya
    Route::view('/tables', 'tables')->name('tables');
    Route::view('/wallet', 'wallet')->name('wallet');
    Route::view('/RTL', 'RTL')->name('RTL');
    Route::view('/profile', 'account-pages.profile')->name('profile');

    Route::get('/laravel-examples/user-profile', [ProfileController::class, 'index'])->name('users.profile');
    Route::put('/laravel-examples/user-profile/update', [ProfileController::class, 'update'])->name('users.update');
    Route::get('/laravel-examples/users-management', [UserController::class, 'index'])->name('users-management');

    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});

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
