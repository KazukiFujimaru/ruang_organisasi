<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;
use Illuminate\Support\Facades\Auth;

class InventarisController extends Controller
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

        

        // Mendapatkan semua data inventaris
        $inventariss = Inventaris::where('organisasi_id', $organisasi_id)->get();

        return view('inventaris', compact('inventariss'));
    }
}
