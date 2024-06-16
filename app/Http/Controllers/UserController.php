<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('laravel-examples.users-management', compact('users'));
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $rememberMe = $request->has('remember_me');

        if (Auth::attempt($credentials, $rememberMe)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Periksa apakah pengguna memiliki organisasi
            if ($user->organization_id && $user->role_id) {
                // Pengguna memiliki organisasi dan peran, arahkan ke dashboard organisasi
                return redirect()->route('organisasi.dashboard', ['id' => $user->organization_id]);
            } else {
                // Pengguna tidak memiliki organisasi, arahkan ke halaman pilihan organisasi
                return redirect()->route('pilih.organisasi');
            }
        }

        return back()->withErrors([
            'message' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email', 'remember_me'));
    }

    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $rememberMe = $request->rememberMe ? true : false;

        if (Auth::attempt($credentials, $rememberMe)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Periksa apakah pengguna memiliki organisasi
            if ($user->organization_id && $user->role_id) {
                // Pengguna memiliki organisasi dan peran, arahkan ke dashboard organisasi
                return redirect()->route('organisasi.dashboard', ['id' => $user->organization_id]);
            } else {
                // Pengguna tidak memiliki organisasi, arahkan ke halaman pilihan organisasi
                return redirect()->route('pilih.organisasi');
            }
        }

        return back()->withErrors([
            'message' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }
}
