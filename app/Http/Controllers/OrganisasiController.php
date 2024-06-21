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
        // Lakukan validasi terlebih dahulu
        $validator = Validator::make($request->all(), [
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

        // Jika validasi gagal, kembalikan dengan pesan error dan data input sebelumnya
        if ($validator->fails()) {
            return redirect()->route('organisasi.edit')
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Terdapat kesalahan dalam pengisian form. Silakan periksa kembali.');
        }

        // Jika validasi berhasil, lanjutkan proses update
        $user = Auth::user();
        $organisasi = Organisasi::find($id);

        // Pastikan organisasi ditemukan
        if (!$organisasi) {
            return redirect()->route('organisasi.edit')->with('error', 'Organisasi tidak ditemukan.');
        }

        // Periksa izin pengguna untuk mengupdate organisasi
        if ($organisasi->id != $user->organization_id) {
            return redirect()->route('organisasi.edit')->with('error', 'Anda tidak memiliki izin untuk mengupdate organisasi ini.');
        }

        // Lakukan update data organisasi
        if ($organisasi->update($request->all())) {
            return redirect()->route('organisasi-profile')->with('success', 'Organisasi berhasil diperbarui.');
        } else {
            return redirect()->route('organisasi.edit')->with('error', 'Gagal memperbarui organisasi. Silakan coba lagi.');
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
            $organisasi->logo_organisasi = $request->file('logo_organisasi')->store('logo_organisasi');
        }

        if ($request->hasFile('logo_instansi')) {
            $organisasi->logo_instansi = $request->file('logo_instansi')->store('logo_instansi');
        }

        if ($request->hasFile('ADART')) {
            $organisasi->ADART = $request->file('ADART')->store('ADART');
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
