<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Organisasi;
use App\Models\Divisi;
use App\Models\Role;
use App\Models\DivisiRole;
use App\Models\Keanggotaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $user = Auth::user();
        $organisasi = $user->organisasi;

        $divisis = $organisasi ? $organisasi->divisis : collect();

        return view('user', compact('user', 'organisasi', 'divisis'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
    
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:Ketua,Wakil Ketua,Sekretaris,Bendahara,Anggota',
            'divisi_role_id' => 'nullable|exists:divisi_roles,id',
            'foto_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tentang_saya' => 'nullable|string',
        ]);
    
        // Update user attributes
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->tentang_saya = $request->input('tentang_saya');
    
        // Update role
        $role = Role::where('nama', $request->role)
                    ->where('organisasi_id', $user->organization_id)
                    ->first();
    
        if (!$role) {
            // Jika role tidak ditemukan, buat baru
            $role = Role::create([
                'nama' => $request->role,
                'organisasi_id' => $user->organization_id,
            ]);
        }
    
        $user->role_id = $role->id;
    
        // Update divisi role if necessary
        if ($request->role === 'Anggota') {
            // Validate divisi_role_id presence
            $request->validate([
                'divisi_id' => 'required|exists:divisis,id',
                'divisirole' => 'required|in:ketua divisi,anggota',
            ]);
    
            $divisiRole = DivisiRole::where('divisi_id', $request->divisi_id)
                                    ->where('nama', $request->divisirole)
                                    ->first();
    
            if (!$divisiRole) {
                $divisiRole = DivisiRole::create([
                    'divisi_id' => $request->divisi_id,
                    'nama' => $request->divisirole,
                ]);
            }
    
            $user->divisi_role_id = $divisiRole->id;
        } else {
            $user->divisi_role_id = null; // Set divisi_role_id to null if role is not 'Anggota'
        }
    
        // Update profile picture
        if ($request->hasFile('foto_profile')) {
            $fotoProfilPath = $request->file('foto_profile')->store('public/foto_profile');
            $user->foto_profile = $fotoProfilPath;
        }
    
        \Log::info('Saving user:', $user->toArray());
        $user->save();
        \Log::info('User saved successfully');
    
        // Update keanggotaan
        $keanggotaan = Keanggotaan::where('user_id', $user->id)
                                  ->where('organisasi_id', $user->organization_id)
                                  ->first();
    
        if ($keanggotaan) {
            \Log::info('Updating keanggotaan:', $keanggotaan->toArray());
            $keanggotaan->role_id = $user->role_id;
            $keanggotaan->divisi_role_id = $user->divisi_role_id;
            $keanggotaan->save();
            \Log::info('Keanggotaan updated successfully');
        }
    
        return redirect()->route('user')->with('success', 'Profile updated successfully');
    }
    
}
