<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisasi;
use App\Models\Keanggotaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


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

    

    
    public function edit($id)
    {
        $user = Auth::user();
        $organisasi = Organisasi::find($id);

        // Pastikan pengguna hanya dapat mengedit organisasi yang mereka miliki
        if ($organisasi->id != $user->organization_id) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to edit this organization.');
        }

        return view('organisasi.edit', compact('organisasi'));
    }

    public function update(Request $request, $id)
    {
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
            'KODE' => 'required|string|unique:organisasis,KODE,' . $id,
        ]);

        $user = Auth::user();
        $organisasi = Organisasi::find($id);

        if (!$organisasi) {
            return redirect()->route('organisasi-profile')->with('error', 'Organization not found.');
        }

        if ($organisasi->id != $user->organization_id) {
            return redirect()->route('organisasi-profile')->with('error', 'You do not have permission to update this organization.');
        }

        // Upload logo_organisasi
        if ($request->hasFile('logo_organisasi')) {
            $logoOrganisasiPath = $request->file('logo_organisasi')->store('logos_organisasi', 'public');
            $organisasi->logo_organisasi = $logoOrganisasiPath;
        }

        // Upload logo_instansi
        if ($request->hasFile('logo_instansi')) {
            $logoInstansiPath = $request->file('logo_instansi')->store('logos_instansi', 'public');
            $organisasi->logo_instansi = $logoInstansiPath;
        }

        // Upload ADART
        if ($request->hasFile('ADART')) {
            $adartPath = $request->file('ADART')->store('adarts', 'public');
            $organisasi->ADART = $adartPath;
        }

        $organisasi->nama = $request->input('nama');
        $organisasi->nama_instansi = $request->input('nama_instansi');
        $organisasi->nama_pembina = $request->input('nama_pembina');
        $organisasi->deskripsi = $request->input('deskripsi');
        $organisasi->sejarah = $request->input('sejarah');
        $organisasi->tanggal_disahkan = $request->input('tanggal_disahkan');
        $organisasi->KODE = $request->input('KODE');

        if ($organisasi->save()) {
            return redirect()->route('organisasi-profile')->with('success', 'Organisasi berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui organisasi. Silakan coba lagi.');
        }
}


    public function create()
    {
        return view('organisasi.create');
    }

    public function store(Request $request)
    {
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
        ]);

        $organisasi = new Organisasi([
            'nama' => $request->nama,
            'nama_instansi' => $request->nama_instansi,
            'nama_pembina' => $request->nama_pembina,
            'deskripsi' => $request->deskripsi,
            'sejarah' => $request->sejarah,
            'tanggal_disahkan' => $request->tanggal_disahkan,
            'KODE' => $request->KODE,
        ]);

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

        return redirect()->route('organisasi.index')->with('success', 'Data organisasi berhasil disimpan.');
    }


    

    public function choose()
    {
        return view('organisasi.choose');
    }


    public function joinForm()
    {
        $organisasis = Organisasi::all();
        return view('organisasi.join', compact('organisasis'));
    }

    public function join(Request $request)
    {
        $user = Auth::user();
        $user->organization_id = $request->organization_id;
        $user->save();

        return redirect()->route('dashboard');
    }
}
