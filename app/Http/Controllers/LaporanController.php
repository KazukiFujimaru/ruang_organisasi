<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDF;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Shared\Html;
use Dompdf\Dompdf;
use Dompdf\Options;

class LaporanController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $organisasi = $user->organisasi;
        return view('laporan.show', compact('organisasi'));
    }

    public function generatePdf($id)
    {
        $organisasi = Organisasi::with(['keanggotaan', 'roles', 'divisis', 'keuangans', 'programs', 'surats', 'inventaris'])
            ->findOrFail($id);

        $data = [
            'organisasi' => $organisasi,
        ];

        $pdf = PDF::loadView('laporanorganisasi', $data);

        return $pdf->download('laporan_pertanggungjawaban.pdf');
    }

    public function generateDocx()
    {
        try {
            // Mendapatkan user yang sedang login
            $user = Auth::user();
            
            // Mendapatkan organisasi yang terkait dengan user
            $organisasi = $user->organisasi;

            // Render view Blade ke dalam bentuk HTML
            $html = view('laporan', compact('organisasi'))->render();

            // Konversi HTML ke PDF menggunakan Dompdf
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true); // Enable HTML5 parsing
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait'); // Paper size and orientation
            $dompdf->render();

            // Simpan PDF sementara
            $pdfPath = storage_path('app/public/temp.pdf');
            file_put_contents($pdfPath, $dompdf->output());

            // Mengambil teks dari PDF
            $canvas = $dompdf->getCanvas();
            $pdfText = $canvas->get_cpdf()->output();

            // Membuat instance dari PhpWord
            $phpWord = new PhpWord();
            $section = $phpWord->addSection();
            $section->addText('Laporan Pertanggungjawaban Organisasi');

            // Tambahkan teks dari PDF ke dalam dokumen DOCX
            $section->addText($pdfText);

            // Menyimpan dokumen sebagai file DOCX
            $fileName = 'Laporan_' . $organisasi->nama . '.docx';
            $filePath = storage_path('app/public/' . $fileName);
            $phpWord->save($filePath, 'Word2007');

            // Hapus file sementara PDF setelah konversi selesai
            unlink($pdfPath);

            // Mengunduh file
            return response()->download($filePath)->deleteFileAfterSend(true);

        } catch (\Exception $e) {
            // Handle any exceptions thrown during DOCX generation
            return back()->withError('Error generating DOCX: ' . $e->getMessage());
        }
    }

}
