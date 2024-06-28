<?php


namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html;

class LaporanController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $organisasi = $user->organisasi;
        return view('laporan.show', compact('organisasi'));
    }

    public function generatePdf()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();
        
        // Mendapatkan organisasi yang terkait dengan user
        $organisasi = $user->organisasi;

        $data = [
            'organisasi' => $organisasi,
        ];

        // Menggunakan Dompdf untuk membuat PDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml(view('laporan', $data)->render());
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Unduh PDF
        return $dompdf->stream('laporan_pertanggungjawaban.pdf');
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

            // Membuat instance dari Dompdf
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            // Simpan PDF sementara
            $pdfPath = storage_path('app/public/temp.pdf');
            file_put_contents($pdfPath, $dompdf->output());

            // Membuat instance dari PhpWord
            $phpWord = new PhpWord();
            $section = $phpWord->addSection();

            // Menambahkan konten HTML ke dalam dokumen DOCX
            Html::addHtml($section, $html, false, false);

            // Menyimpan dokumen sebagai file DOCX
            $fileName = 'Laporan_' . $organisasi->nama . '.docx';
            $filePath = storage_path('app/public/' . $fileName);
            $phpWord->save($filePath, 'Word2007');

            // Hapus file sementara PDF setelah konversi selesai
            unlink($pdfPath);

            // Mengunduh file
            return response()->download($filePath)->deleteFileAfterSend(true);

        } catch (\Exception $e) {
            // Tangani pengecualian yang terjadi selama pembuatan DOCX
            return back()->withError('Error generating DOCX: ' . $e->getMessage());
        }
    }
}
