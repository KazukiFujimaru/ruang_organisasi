<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventaris;
use App\Models\Program;
use App\Models\Keuangan;
use App\Models\Keanggotaan;
use App\Models\Surat;


class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mendapatkan data organisasi yang terkait dengan pengguna yang sedang login
        $user = Auth::user();
        $organisasi = $user->organisasi;

         // Menghitung jumlah entitas terkait
         $jumlahProgram = Program::where('organisasi_id', $organisasi->id)->count();
         $jumlahKeuangan = Keuangan::where('organisasi_id', $organisasi->id)->count();
         $jumlahInventaris = Inventaris::where('organisasi_id', $organisasi->id)->count();
         $jumlahSurat = Surat::where('organisasi_id', $organisasi->id)->count();
         $jumlahKeanggotaan = Keanggotaan::where('organisasi_id', $organisasi->id)->count();
 


        // Menampilkan halaman dashboard dengan data organisasi
        return view('dashboard', [
            'organisasi' => $organisasi,
            'jumlahProgram' => $jumlahProgram,
            'jumlahKeuangan' => $jumlahKeuangan,
            'jumlahInventaris' => $jumlahInventaris,
            'jumlahSurat' => $jumlahSurat,
            'jumlahKeanggotaan' => $jumlahKeanggotaan,
        ]);

    }
}
