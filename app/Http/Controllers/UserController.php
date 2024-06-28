<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Organisasi;
use App\Models\Divisi;
use App\Models\Role;
use App\Models\Keanggotaan;
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

    public function view()
    {
        // Assuming the authenticated user is associated with an Organisasi
        $user = auth()->user();
        $organisasi = $user->organisasi;
    
        // If you need to access the ID specifically
        $organisasiId = $organisasi->id;
    
        $divisis = $organisasi->divisis;
        $role = $user->role;
    
        return view('user', compact('user','organisasi', 'divisis','role'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role_name' => 'required|string',
            'divisi_role_id' => 'nullable|exists:divisi_roles,id',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo_organisasi' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about' => 'nullable|string',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->divisi_role_id = $request->input('divisi_role_id');
        $user->tentang_saya = $request->input('about');

        $role = $user->role;
        $role->nama = $request->input('role_name');
        $role->save();

        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $path = $file->store('public/profile_pictures');
            $user->foto_profil = $path;
        }

        if ($request->hasFile('logo_organisasi')) {
            $file = $request->file('logo_organisasi');
            $path = $file->store('public/organization_logos');
            $user->organisasi->logo_organisasi = $path;
            $user->organisasi->save();
        }

        $user->save();

        return redirect()->route('user.edit')->with('success', 'Profile updated successfully');
    }


}
