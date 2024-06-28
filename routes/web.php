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
use App\Http\Controllers\LaporanController;

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

    // Route Fungsi User
    Route::get('/user/{organisasiId}', [UserController::class, 'view'])->name('user');

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

    Route::get('/laporan/show', [LaporanController::class, 'show'])->name('laporan.show');
    Route::get('/laporan/generate-pdf', [LaporanController::class, 'generatePdf'])->name('laporan.generatePdf');
    Route::get('/laporan/generate-docx', [LaporanController::class, 'generateDocx'])->name('laporan.generateDocx');



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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route bawaan template sebagai berikut :
Route::get('/', function () {
    return redirect('/dashboard');
})->middleware('auth');

Route::get('/dashboarda', function () {
    return view('dashboarda');
})->name('dashboarda')->middleware('auth');

Route::get('/tables', function () {
    return view('tables');
})->name('tables')->middleware('auth');

Route::get('/wallet', function () {
    return view('wallet');
})->name('wallet')->middleware('auth');

Route::get('/RTL', function () {
    return view('RTL');
})->name('RTL')->middleware('auth');

Route::get('/profile', function () {
    return view('account-pages.profile');
})->name('profile')->middleware('auth');

Route::get('/signin', function () {
    return view('account-pages.signin');
})->name('signin');

Route::get('/signup', function () {
    return view('account-pages.signup');
})->name('signup')->middleware('guest');

Route::get('/sign-up', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('sign-up');

Route::post('/sign-up', [RegisterController::class, 'store'])
    ->middleware('guest');

// Tampilan sign-in untuk yang belum login
Route::get('/sign-in', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('sign-in');
Route::post('/sign-in', [LoginController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'store'])
    ->middleware('guest');

Route::get('/laravel-examples/user-profile', [ProfileController::class, 'index'])->name('users.profile')->middleware('auth');
Route::put('/laravel-examples/user-profile/update', [ProfileController::class, 'update'])->name('users.update')->middleware('auth');
Route::get('/laravel-examples/users-management', [UserController::class, 'index'])->name('users-management')->middleware('auth');

// Route tampilan data di view-layout
Route::get('/program-kerja', function () {
    return view('view-layout.view-proker');
})->name('view-proker')->middleware('auth');

Route::get('/keuangana', function () {
    return view('view-layout.view-keuangan');
})->name('view-keuangan')->middleware('auth');

Route::get('/surata', function () {
    return view('view-layout.view-surat');
})->name('view-surat')->middleware('auth');

Route::get('/arsip', function () {
    return view('view-layout.view-arsip');
})->name('view-arsip')->middleware('auth');

Route::get('/inventarisa', function () {
    return view('view-layout.view-inventaris');
})->name('view-inventaris')->middleware('auth');

Route::get('/lpj', function () {
    return view('view-layout.view-lpj');
})->name('view-lpj')->middleware('auth');

//Route tampilan user
Route::get('/profile-user', function () {
    return view('account-pages.profile-user');
})->name('profile-user')->middleware('auth');

Route::get('/profile-user-edit', function () {
    return view('account-pages.user-edit');
})->name('user-edit')->middleware('auth');

//Route tampilan organisasi
Route::get('/profile-organisasi', function () {
    return view('account-pages.profile-organisasi');
})->name('profile-organisasi')->middleware('auth');

Route::get('/profile-organisasi-edit', function () {
    return view('account-pages.organisasi-edit');
})->name('organisasi-edit')->middleware('auth');

//Route test
Route::get('/a/a', function () {
    return view('test');
})->name('test')->middleware('guest');