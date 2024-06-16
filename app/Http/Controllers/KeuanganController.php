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

        // Menghitung saldo terbaru
        $saldo_terbaru = Keuangan::hitungSaldoTerbaru($organisasi_id);


        // Mendapatkan semua data keuangan
        $keuangans = Keuangan::where('organisasi_id', $organisasi_id)->get();

        return view('keuangan', compact('keuangans', 'saldo_terbaru'));
    }

    // Method untuk menampilkan form
    public function create()
    {
        return view('keuangan.create');
    }

    // Method untuk menyimpan data keuangan
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nama' => 'required|string',
            'jenis' => 'required|in:pemasukan,pengeluaran',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
            'jumlah' => 'required|numeric',
            'bukti' => 'nullable|image|max:2048', // Sesuaikan dengan kebutuhan Anda
        ]);

        // Pastikan pengguna sudah login
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        // Pastikan pengguna memiliki organization_id
        if (is_null($user->organization_id)) {
            return redirect()->route('home')->with('error', 'You do not belong to any organization.');
        }

        // Buat transaksi keuangan baru
        $keuangan = new Keuangan([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
            'organisasi_id' => $user->organization_id,
            'bukti' => $request->file('bukti') ? $request->file('bukti')->store('bukti_keuangan') : null,
        ]);

        // Simpan transaksi keuangan
        $keuangan->save();

        // Hitung saldo terbaru
        $saldo_terbaru = $this->hitungSaldoTerbaru($user->organization_id);

        // Redirect ke halaman keuangan dengan pesan sukses
        return redirect()->route('keuangan')->with('success', 'Data keuangan berhasil ditambahkan. Saldo terbaru: ' . $saldo_terbaru);
    }

    // Method untuk menghitung saldo terbaru
    private function hitungSaldoTerbaru($organisasi_id)
    {
        $pemasukan = Keuangan::where('organisasi_id', $organisasi_id)->where('jenis', 'pemasukan')->sum('jumlah');
        $pengeluaran = Keuangan::where('organisasi_id', $organisasi_id)->where('jenis', 'pengeluaran')->sum('jumlah');
        return $pemasukan - $pengeluaran;
    }
}
