<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

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

Route::get('/keuangan', function () {
    return view('view-layout.view-keuangan');
})->name('view-keuangan')->middleware('auth');

Route::get('/surat', function () {
    return view('view-layout.view-surat');
})->name('view-surat')->middleware('auth');

Route::get('/arsip', function () {
    return view('view-layout.view-arsip');
})->name('view-arsip')->middleware('auth');

Route::get('/inventaris', function () {
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