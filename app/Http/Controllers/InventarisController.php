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

    public function create()
    {
        return view('inventaris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'sebelum' => 'required|numeric',
            'ditambah' => 'required|numeric',
            'digunakan' => 'required|numeric',
            'sisa' => 'required|numeric',
            'keterangan' => 'nullable|string',
            'bukti' => 'nullable|mimes:png,jpg,jpeg,pdf,docx|max:2048',
        ]);

        $user = Auth::user();
        if(!$user) {
            return redirect()->route('login')->with('error','tolong login terlebih dahulu');
        }

        if (is_null($user->organization_id)){
            return redirect()->route('home')->with('error','anda tidak tergabung dalam organisasi');
        }

        $inventaris = new Inventaris([
            'nama' => $request->nama,
            'sebelum' => $request->sebelum,
            'ditambah' => $request->ditambah,
            'digunakan' => $request->digunakan,
            'sisa' => $request->sisa,
            'keterangan' => $request->keterangan,
            'organisasi_id' => $user->organization_id,  
            'bukti' => $request->file('bukti') ? $request->file('bukti')->store('bukti_inventaris') : null,  
        ]);

        $inventaris->save();

        return redirect()->route('keuangan')->with('succes','data inventaris berhasil di tambah');
    }

    public function destroy($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        $inventaris->delete();

        return redirect()->route('inventaris')->with('success', 'Data inventaris berhasil dihapus.');
    }
}
