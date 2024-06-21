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
            return redirect()->route('inventaris')->with('error', 'You do not belong to any organization.');
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
            return redirect()->route('inventaris')->with('error','anda tidak tergabung dalam organisasi');
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

        return redirect()->route('inventaris')->with('succes','data inventaris berhasil di tambah');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $inventaris = Inventaris::findOrFail($id);

        if ($inventaris->organisasi_id !== $user->organization_id) {
            return redirect()->route('inventaris')->with('error', 'Anda tidak memiliki izin untuk mengedit inventaris ini.');
        }

        return view('inventaris.edit', compact('inventaris'));
    }

    public function update(Request $request, $id)
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
        if (!$user){
            return redirect()->route('login')->with('error','silahkan login terlebih dahulu');
        }

        if (is_null($user->organization_id)) {
            return redirect()->route('home')->with('error','kamu belum memiliki organisasi');
        }

        $inventaris = Inventaris::findOrFail($id);

        if ($inventaris->organisasi_id !== $user->organization_id) {
            return redirect()->route('inventaris')->with('error', 'Anda tidak memiliki izin untuk mengedit inventaris ini.');
        }

        $inventaris->nama = $request->nama;
        $inventaris->sebelum = $request->sebelum;
        $inventaris->ditambah = $request->ditambah;
        $inventaris->digunakan = $request->digunakan;
        $inventaris->sisa = $request->sisa;
        $inventaris->keterangan = $request->keterangan;
        

        if ($request->hasFile('bukti')) {
            $inventaris->bukti = $request->file('bukti')->store('bukti_inventaris');
        }

        if ($inventaris->save()) {
            return redirect()->route('inventaris')->with('success', 'Data inventaris berhasil diperbarui.');
        } else {
            return redirect()->route('inventaris.edit', $id)->with('error', 'Terjadi kesalahan saat memperbarui data inventaris.');
        }
    }

    public function destroy($id)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu');
        }

        if (is_null($user->organization_id)) {
            return redirect()->route('home')->with('error', 'Anda belum tergabung dalam organisasi');
        }

        $inventaris = Inventaris::findOrFail($id);

        if ($inventaris->organisasi_id !== $user->organization_id) {
            return redirect()->route('inventaris')->with('error', 'Anda tidak memiliki izin untuk menghapus inventaris ini.');
        }

        if ($inventaris->delete()) {
            return redirect()->route('inventaris')->with('success', 'Data inventaris berhasil dihapus.');
        } else {
            return redirect()->route('inventaris')->with('error', 'Terjadi kesalahan saat menghapus data inventaris.');
        }
    }

}
