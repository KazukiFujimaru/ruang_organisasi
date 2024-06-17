<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
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
            return redirect()->route('home')->with('error', 'You do not belong to any organization.');
        }

        $organisasi_id = $user->organization_id;

        

        // Mendapatkan semua data surat
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
            'dokumen' => 'required|mimes:pdf,docx,png,jpg,jpeg|max:2048',
            

        ]);

        $user = Auth::user();
        if (!$user){
            return redirect()->route('login')->with('error','silahkan login terlebih dahulu');
        }

        if (is_null($user->organization_id)) {
            return redirect()->route('home')->with('error','kamu belum memiliki organisasi');
        }

        $surat = new Surat([
            'nomor_surat' => $request->nomor_surat,
            'tanggal' => $request->tanggal,
            'jenis' => $request->jenis,
            'perihal' => $request->perihal,
            'asal_surat' => $request->asal_surat,
            'organisasi_id' => $user->organization_id,
            'dokumen' => $request->file('dokumen') ? $request->file('dokumen')->store('dokumen_keuangan') : null,

        ]);

        $surat->save();

        return redirect()->route('surat')->with('success', 'Data surat berhasil ditambahkan.');
    }
}
