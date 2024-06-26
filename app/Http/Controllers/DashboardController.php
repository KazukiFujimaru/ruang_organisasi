<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        // Menampilkan halaman dashboard dengan data organisasi
        return view('dashboard', ['organisasi' => $organisasi]);
    }
}
