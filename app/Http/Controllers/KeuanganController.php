<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuangan;
use Illuminate\Support\Facades\Auth;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

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
        $log = new Logger('debug');
        $log->pushHandler(new StreamHandler(storage_path('logs/laravel.log'), Logger::DEBUG));

        $log->info('Store method called');

        try {
            $request->validate([
                'nama' => 'required|string',
                'jenis' => 'required|in:pemasukan,pengeluaran',
                'tanggal' => 'required|date',
                'keterangan' => 'nullable|string',
                'jumlah' => 'required|numeric',
                'bukti' => 'nullable|mimes:png,jpg,jpeg,pdf|max:5120',
            ]);

            $log->info('Validation passed');

            $user = Auth::user();
            if (!$user) {
                $log->error('User not authenticated');
                return redirect()->route('login')->with('error', 'Please login first.');
            }

            $log->info('User authenticated');

            if (is_null($user->organization_id)) {
                $log->error('User does not belong to any organization');
                return redirect()->route('home')->with('error', 'You do not belong to any organization.');
            }

            $log->info('User belongs to organization ID: ' . $user->organization_id);

            $buktiPath = null;
            if ($request->hasFile('bukti')) {
                $file = $request->file('bukti');
                $log->info('File found: ' . $file->getClientOriginalName());
                $log->info('File MIME type: ' . $file->getClientMimeType());
                $log->info('File extension: ' . $file->getClientOriginalExtension());

                $buktiPath = $file->store('bukti_keuangan', 'public');
                $log->info('File stored at: ' . $buktiPath);
            }

            $keuangan = new Keuangan([
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
                'jumlah' => $request->jumlah,
                'organisasi_id' => $user->organization_id,
                'bukti' => $buktiPath,
            ]);

            $keuangan->save();

            $log->info('Keuangan data saved');

            return redirect()->route('keuangan')->with('success', 'Data keuangan berhasil ditambahkan.');
        } catch (\Exception $e) {
            $log->error('Exception occurred: ' . $e->getMessage());
            return redirect()->route('keuangan.create')->with('error', 'Terjadi kesalahan saat menyimpan data keuangan.');
        }
    }

    public function destroy($id)
    {
        $keuangan = Keuangan::findOrFail($id);
        $keuangan->delete();

        return redirect()->route('keuangan')->with('success', 'Data keuangan berhasil dihapus.');
    }
}
