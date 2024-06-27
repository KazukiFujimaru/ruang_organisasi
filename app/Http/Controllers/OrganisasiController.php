<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisasi;
use App\Models\Divisi;
use App\Models\Role;
use App\Models\Keanggotaan;
use Illuminate\Support\Facades\Auth;

class OrganisasiController extends Controller
{

    public function index()
    {
        // Pastikan pengguna sudah login
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        // Pastikan pengguna memiliki organization_id
        if (is_null($user->organization_id)) {
            return redirect()->route('inventaris')->with('error', 'You do not belong to any organization.');
        }

        // Ambil organisasi berdasarkan organization_id dari pengguna
        $organisasi = $user->organisasi;

        return view('account-pages.organisasi-profile', compact('organisasi'));
    }

    public function create()
    {
        return view('organisasi.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'logo_organisasi.mimes' => 'Logo Organisasi harus file dengan tipe png, jpg, atau jpeg.',
            'logo_organisasi.max' => 'Ukuran maksimal Logo Organisasi adalah 2048 kilobytes.',
            'logo_instansi.mimes' => 'Logo Instansi harus file dengan tipe png, jpg, atau jpeg.',
            'logo_instansi.max' => 'Ukuran maksimal Logo Instansi adalah 2048 kilobytes.',
            'ADART.mimes' => 'AD/ART  harus file dengan tipe pdf, atau docx.',
            'ADART.max' => 'Ukuran maksimal AD/ART adalah 2048 kilobytes.',
            'KODE.unique' => 'Kode yang anda ingin gunakan sudah ada, silahkan gunakan kode lain.',
        ];
    
        $request->validate([
            'nama' => 'required|string',
            'nama_instansi' => 'required|string',
            'nama_pembina' => 'required|string',
            'deskripsi' => 'nullable|string',
            'sejarah' => 'nullable|string',
            'tanggal_disahkan' => 'nullable|date',
            'logo_organisasi' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'logo_instansi' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'ADART' => 'nullable|mimes:pdf,docx|max:2048',
            'KODE' => 'required|string|unique:organisasis,KODE',
        ], $messages);
    
        $organisasi = new Organisasi([
            'nama' => $request->nama,
            'nama_instansi' => $request->nama_instansi,
            'nama_pembina' => $request->nama_pembina,
            'deskripsi' => $request->deskripsi,
            'sejarah' => $request->sejarah,
            'tanggal_disahkan' => $request->tanggal_disahkan,
            'KODE' => $request->KODE,
        ]);
    
        try {
            if ($request->hasFile('logo_organisasi')) {
                $organisasi->logo_organisasi = $request->file('logo_organisasi')->store('public/logo_organisasi');
            }
    
            if ($request->hasFile('logo_instansi')) {
                $organisasi->logo_instansi = $request->file('logo_instansi')->store('public/logo_instansi');
            }
    
            if ($request->hasFile('ADART')) {
                $organisasi->ADART = $request->file('ADART')->store('public/ADART');
            }
    
            $organisasi->save();
    
            // Set the organization_id of the user who created the organization
            $user = Auth::user();
            $user->organization_id = $organisasi->id;
            $user->save();
    
            // Redirect to the form for creating divisions
            return redirect()->route('organisasi.create-divisi', $organisasi->id)->with('success', 'Organisasi created successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }
    

    public function createDivisi($organisasiId)
    {
        $organisasi = Organisasi::findOrFail($organisasiId);
        return view('organisasi.create-divisi', compact('organisasi'));
    }

    public function storeDivisi(Request $request, $organisasiId)
    {
        $request->validate([
            'divisi.*.nama' => 'required|string',
            'divisi.*.keterangan' => 'required|string',
        ]);

        $organisasi = Organisasi::findOrFail($organisasiId);

        foreach ($request->divisi as $divisiData) {
            Divisi::create([
                'nama' => $divisiData['nama'],
                'keterangan' => $divisiData['keterangan'],
                'organisasi_id' => $organisasi->id,
            ]);
        }

        return redirect()->route('organisasi.choose-role', $organisasi->id);
    }

    public function chooseRole($organisasiId)
    {
        $organisasi = Organisasi::findOrFail($organisasiId);
        $divisis = $organisasi->divisis;

        return view('organisasi.choose-role', compact('organisasi', 'divisis'));
    }

    public function storeRole(Request $request, $organisasiId)
    {
        $request->validate([
            'role' => 'required|in:Ketua,Wakil Ketua,Sekretaris,Bendahara,Anggota',
            'divisi_role_id' => 'nullable|exists:divisis,id',
        ]);

        $user = Auth::user();

        $role = Role::create([
            'nama' => $request->role,
            'organisasi_id' => $organisasiId,
        ]);

        if ($request->role === 'Anggota') {
            $user->divisi_role_id = $request->divisi_role_id;
        }

        $user->role_id = $role->id;
        $user->save();

        // Tambahkan pengguna ke tabel keanggotaan
        Keanggotaan::create([
            'user_id' => $user->id,
            'organisasi_id' => $organisasiId,
            'role_id' => $role->id,
            'joined_at' => now(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Role dan Divisi berhasil disimpan.');
    }

    public function joinForm()
    {
        return view('organisasi.join');
    }

    public function join(Request $request)
    {
        $request->validate([
            'kode_organisasi' => 'required|string|exists:organisasis,KODE',
        ]);

        $organisasi = Organisasi::where('KODE', $request->kode_organisasi)->first();

        $user = Auth::user();
        $user->organization_id = $organisasi->id;
        $user->save();

        Keanggotaan::create([
            'user_id' => $user->id,
            'organisasi_id' => $organisasi->id,
            'role_id' => 5, // Default role_id untuk Anggota
            'joined_at' => now(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Anda berhasil bergabung dengan organisasi.');
    }

    public function choose()
    {
        return view('organisasi.choose');
    }

    public function edit()
    {
            // Pastikan pengguna sudah login
            $user = Auth::user();
            if (!$user) {
                return redirect()->route('login')->with('error', 'Please login first.');
            }
    
            // Pastikan pengguna memiliki organization_id
            if (is_null($user->organization_id)) {
                return redirect()->route('inventaris')->with('error', 'You do not belong to any organization.');
            }
    
            // Ambil organisasi berdasarkan organization_id dari pengguna
            $organisasi = $user->organisasi;

        return view('organisasi.edit', compact('organisasi'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $organisasi = $user->organisasi;
    
        $messages = [
            'logo_organisasi.mimes' => 'Logo Organisasi harus file dengan tipe png, jpg, atau jpeg.',
            'logo_organisasi.max' => 'Ukuran maksimal Logo Organisasi adalah 2048 kilobytes.',
            'logo_instansi.mimes' => 'Logo Instansi harus file dengan tipe png, jpg, atau jpeg.',
            'logo_instansi.max' => 'Ukuran maksimal Logo Instansi adalah 2048 kilobytes.',
            'ADART.mimes' => 'AD/ART harus file dengan tipe pdf, atau docx.',
            'ADART.max' => 'Ukuran maksimal AD/ART adalah 2048 kilobytes.',
            'KODE.unique' => 'Kode yang anda ingin gunakan sudah ada, silahkan gunakan kode lain.',
        ];
    
        $rules = [
            'nama' => 'required|string',
            'nama_instansi' => 'required|string',
            'nama_pembina' => 'required|string',
            'deskripsi' => 'nullable|string',
            'sejarah' => 'nullable|string',
            'tanggal_disahkan' => 'nullable|date',
            'logo_organisasi' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'logo_instansi' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'ADART' => 'nullable|mimes:pdf,docx|max:2048',
        ];
    
        // Add unique validation rule for KODE if it's different from the current KODE
        if ($request->KODE !== $organisasi->KODE) {
            $rules['KODE'] = 'required|string|unique:organisasis,KODE';
        } else {
            $rules['KODE'] = 'required|string';
        }
    
        $request->validate($rules, $messages);
    
        // Update the organization with the validated data
        $organisasi->update($request->all());
    
        return redirect()->route('organisasi-profile')->with('success', 'Profile updated successfully.');
    }

}


