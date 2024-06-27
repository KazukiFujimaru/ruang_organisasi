<?php


namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDF;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Shared\ZipArchive;
use Barryvdh\Snappy\Facades\SnappyPdf as SnappyPDF;






class LaporanController extends Controller
{

    public function show()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();
        
        // Mendapatkan organisasi yang terkait dengan user
        $organisasi = $user->organisasi;
        
        // Tampilkan view dengan data organisasi
        return view('laporan.show', compact('organisasi'));
    }


    public function generatePdf($id)
    {
        $organisasi = Organisasi::with(['keanggotaan', 'roles', 'divisis', 'keuangans', 'programs', 'surats', 'inventaris'])->findOrFail($id);

        $data = [
            'organisasi' => $organisasi,
        ];

        $pdf = PDF::loadView('laporanorganisasi', $data);

        return $pdf->download('laporan_pertanggungjawaban.pdf');
    }

    public function generateDocx()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();
        
        // Mendapatkan organisasi yang terkait dengan user
        $organisasi = $user->organisasi;

        // Membuat instance dari PhpWord
        $phpWord = new PhpWord();

        // Menambahkan section
        $section = $phpWord->addSection();

        // Menambahkan konten ke dalam dokumen
        $section->addText('Laporan Pertanggungjawaban Organisasi');
        $section->addText('Nama Organisasi: ' . $organisasi->nama);
        $section->addText('Nama Instansi: ' . $organisasi->nama_instansi);
        // Tambahkan konten lainnya sesuai kebutuhan

        // Menyimpan dokumen sebagai file DOCX
        $fileName = 'Laporan_' . $organisasi->nama . '.docx';
        $filePath = storage_path('app/public/' . $fileName);

        $phpWord->save($filePath, 'Word2007');

        // Mengunduh file
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
