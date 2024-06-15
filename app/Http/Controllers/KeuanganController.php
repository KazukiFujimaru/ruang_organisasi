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
        $organisasi_id = $user->organization_id;

        // Menghitung saldo terakhir
        $pemasukan = Keuangan::where('organisasi_id', $organisasi_id)
                             ->where('type', 'pemasukan')
                             ->sum('jumlah');

        $pengeluaran = Keuangan::where('organisasi_id', $organisasi_id)
                               ->where('type', 'pengeluaran')
                               ->sum('jumlah');

        $saldo_terakhir = $pemasukan - $pengeluaran;

        // Mendapatkan semua data keuangan
        $keuangans = Keuangan::where('organisasi_id', $organisasi_id)->get();

        return view('keuangan.index', compact('keuangans', 'saldo_terakhir'));
    }
}
