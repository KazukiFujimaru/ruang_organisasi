<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuangan;
use Illuminate\Support\Facades\Auth;

class KeuanganController extends Controller
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

        $saldo_terbaru = Keuangan::hitungSaldoTerbaru($organisasi_id);

        $keuangans = Keuangan::where('organisasi_id', $organisasi_id)
        ->orderBy('tanggal', 'asc')
        ->get();

        return view('keuangan', compact('keuangans', 'saldo_terbaru'));
    }

    public function create()
    {
        return view('keuangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'jenis' => 'required|in:pemasukan,pengeluaran',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
            'jumlah' => 'required|numeric',
            'bukti' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        if (is_null($user->organization_id)) {
            return redirect()->route('home')->with('error', 'You do not belong to any organization.');
        }

        $keuangan = new Keuangan([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
            'organisasi_id' => $user->organization_id,
            'bukti' => $request->file('bukti') ? $request->file('bukti')->store('bukti_keuangan') : null,
        ]);

        $keuangan->save();

        return redirect()->route('keuangan')->with('success', 'Data keuangan berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $keuangan = Keuangan::findOrFail($id);
        $keuangan->delete();

        return redirect()->route('keuangan')->with('success', 'Data keuangan berhasil dihapus.');
    }
}

