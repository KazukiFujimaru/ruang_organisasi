<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuangan;
use Illuminate\Support\Facades\Auth;

class KeuanganController extends Controller
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

        // Menghitung saldo terakhir
        $pemasukan = Keuangan::where('organisasi_id', $organisasi_id)
                             ->where('jenis', 'pemasukan')
                             ->sum('jumlah');

        $pengeluaran = Keuangan::where('organisasi_id', $organisasi_id)
                               ->where('jenis', 'pengeluaran')
                               ->sum('jumlah');

        $saldo_terakhir = $pemasukan - $pengeluaran;

        // Mendapatkan semua data keuangan
        $keuangans = Keuangan::where('organisasi_id', $organisasi_id)->get();

        return view('keuangan', compact('keuangans', 'saldo_terakhir'));
    }
}
