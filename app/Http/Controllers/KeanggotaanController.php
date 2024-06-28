<?php
namespace App\Http\Controllers;

use App\Models\Keanggotaan;
use Illuminate\Http\Request;

class KeanggotaanController extends Controller
{
    public function index()
    {
        $keanggotaan = Keanggotaan::with(['user', 'role', 'divisiRole'])
            ->where('organisasi_id', auth()->user()->organisasi_id)
            ->get();

        return view('account-pages.organisasi-profile', compact('keanggotaan'));
    }
}
