<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        if (is_null($user->organization_id)) {
            return redirect()->route('home')->with('error', 'You do not belong to any organization.');
        }

        $organisasi_id = $user->organization_id;
        $surats = Surat::where('organisasi_id', $organisasi_id)->get();

        return view('surat', compact('surats'));
    }

    public function create()
    {
        return view('surat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|string',
            'tanggal' => 'required|date',
            'jenis' => 'required|in:masuk,keluar',
            'perihal' => 'required|string',
            'asal_surat' => 'required|string',
            'dokumen' => 'required|mimes:pdf,docx,png,jpg,jpeg|max:5048',
        ]);

        $user = Auth::user();
        if (!$user){
            return redirect()->route('login')->with('error','silahkan login terlebih dahulu');
        }

        if (is_null($user->organization_id)) {
            return redirect()->route('home')->with('error','kamu belum memiliki organisasi');
        }

        $dokumenPath = null;
        if ($request->hasFile('dokumen')) {
            $dokumenPath = $request->file('dokumen')->store('dokumen_surat', 'public');
        }

        $surat = new Surat([
            'nomor_surat' => $request->nomor_surat,
            'tanggal' => $request->tanggal,
            'jenis' => $request->jenis,
            'perihal' => $request->perihal,
            'asal_surat' => $request->asal_surat,
            'organisasi_id' => $user->organization_id,
            'dokumen' => $dokumenPath,
        ]);

        if ($surat->save()) {
            return redirect()->route('surat')->with('success', 'Data surat berhasil ditambahkan.');
        } else {
            return redirect()->route('surat.create')->with('error', 'Terjadi kesalahan saat menyimpan data surat.');
        }
    }

    public function edit($id)
    {
        $user = Auth::user();
        $surat = Surat::findOrFail($id);

        if ($surat->organisasi_id !== $user->organization_id) {
            return redirect()->route('surat')->with('error', 'Anda tidak memiliki izin untuk mengedit surat ini.');
        }

        return view('surat.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'required|string',
            'tanggal' => 'required|date',
            'jenis' => 'required|in:masuk,keluar',
            'perihal' => 'required|string',
            'asal_surat' => 'required|string',
            'dokumen' => 'mimes:pdf,docx,png,jpg,jpeg|max:5048',
        ]);

        $user = Auth::user();
        if (!$user){
            return redirect()->route('login')->with('error','silahkan login terlebih dahulu');
        }

        if (is_null($user->organization_id)) {
            return redirect()->route('home')->with('error','kamu belum memiliki organisasi');
        }

        $surat = Surat::findOrFail($id);

        if ($surat->organisasi_id !== $user->organization_id) {
            return redirect()->route('surat')->with('error', 'Anda tidak memiliki izin untuk mengedit surat ini.');
        }

        $surat->nomor_surat = $request->nomor_surat;
        $surat->tanggal = $request->tanggal;
        $surat->jenis = $request->jenis;
        $surat->perihal = $request->perihal;
        $surat->asal_surat = $request->asal_surat;

        if ($request->hasFile('dokumen')) {
            $surat->dokumen = $request->file('dokumen')->store('dokumen_surat', 'public');
        }

        if ($surat->save()) {
            return redirect()->route('surat')->with('success', 'Data surat berhasil diperbarui.');
        } else {
            return redirect()->route('surat.edit', $id)->with('error', 'Terjadi kesalahan saat memperbarui data surat.');
        }
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $surat = Surat::findOrFail($id);

        if ($surat->organisasi_id !== $user->organization_id) {
            return redirect()->route('surat')->with('error', 'Anda tidak memiliki izin untuk menghapus surat ini.');
        }

        $surat->delete();

        return redirect()->route('surat')->with('success', 'Data surat berhasil dihapus.');
    }
}
