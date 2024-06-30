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

        // Convert logo to base64
        $logoPath = storage_path('app/public/' . str_replace('public/', '', $organisasi->logo_organisasi));
        $logoData = base64_encode(file_get_contents($logoPath));
        $logoType = pathinfo($logoPath, PATHINFO_EXTENSION);
        $logoBase64 = 'data:image/' . $logoType . ';base64,' . $logoData;


        return view('laporan.show', compact('organisasi', 'logoBase64'));
    }

    public function generatePdf()
    {
        set_time_limit(0);
    
        $user = Auth::user();
        $organisasi = $user->organisasi;
    
        // Convert logo to base64
        $logoPath = storage_path('app/public/' . str_replace('public/', '', $organisasi->logo_organisasi));
        $logoData = base64_encode(file_get_contents($logoPath));
        $logoType = pathinfo($logoPath, PATHINFO_EXTENSION);
        $logoBase64 = 'data:image/' . $logoType . ';base64,' . $logoData;
    
        $data = [
            'organisasi' => $organisasi,
            'logoBase64' => $logoBase64,
        ];
    
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
    
        $html = view('laporan', $data)->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        return $dompdf->stream('laporan_pertanggungjawaban.pdf');
    }

    public function generateDocx()
    {
        
        try {
            // Meningkatkan batas waktu eksekusi skrip
            set_time_limit(0);
            $user = Auth::user();
            $organisasi = $user->organisasi;

            // Render view Blade ke dalam bentuk HTML
            $html = view('laporan', compact('organisasi'))->render();

            // Membuat instance dari PhpWord
            $phpWord = new PhpWord();
            $section = $phpWord->addSection();

            // Menambahkan konten HTML ke dalam dokumen DOCX
            Html::addHtml($section, $html, false, false);

            // Menyimpan dokumen sebagai file DOCX
            $fileName = 'Laporan_' . $organisasi->nama . '.docx';
            $filePath = storage_path('app/public/' . $fileName);
            $phpWord->save($filePath, 'Word2007');

            // Mengunduh file
            return response()->download($filePath)->deleteFileAfterSend(true);

        } catch (\Exception $e) {
            // Tangani pengecualian yang terjadi selama pembuatan DOCX
            return back()->withError('Error generating DOCX: ' . $e->getMessage());
        }
    }
}
