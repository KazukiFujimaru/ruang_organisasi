<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
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

        // Mendapatkan semua data program
        $programs = Program::where('organisasi_id', $organisasi_id)->get();

        return view('program', compact('programs'));
    }

    public function create()
    {
        return view('program.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required|string',
            'description' => 'nullable|string',
            'type' => 'required|in:program kerja,kegiatan',
            'jenis' => 'required|in:harian,mingguan,bulanan,tahunan',
            'status' => 'required|in:terlaksana,tidak terlaksana',
            'tanggal' => 'required|date',
            'dokumen' => 'nullable|mimes:png,jpg,jpeg,pdf,docx|max:5120',
        ], [
            'dokumen.mimes' => 'Dokumen unggahan harus file dengan tipe png, jpg, jpeg, pdf, atau docx.',
            'dokumen.max' => 'Ukuran maksimal dokumen unggahan adalah 5MB.',
        ]);

        $user = Auth::user();
        if (!$user){
            return redirect()->route('login')->with('error','Silahkan login terlebih dahulu');
        }

        if (is_null($user->organization_id)){
            return redirect()->route('home')->with('error', 'Anda tidak tergabung di organisasi');
        }

        $dokumenPath = null;
        if ($request->hasFile('dokumen')) {
            $dokumenPath = $request->file('dokumen')->store('dokumen_program', 'public');
        }

        $program = new Program([
            'nama' => $request->nama,
            'description' => $request->description,
            'type' => $request->type,
            'jenis' => $request->jenis,
            'status' => $request->status,
            'tanggal' => $request->tanggal,
            'organisasi_id'=> $user->organization_id,
            'dokumen' => $dokumenPath,
        ]);

        $program->save();
        return redirect()->route('program')->with('success', 'Data program berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return redirect()->route('program')->with('success', 'Data program berhasil dihapus.');
    }
    public function edit($id)
    {
        $user = Auth::user();
        $program = Program::findOrFail($id);

        if ($program->organisasi_id !== $user->organization_id) {
            return redirect()->route('program')->with('error', 'Anda tidak memiliki izin untuk mengedit program ini.');
        }

        return view('program.edit', compact('program'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'description' => 'nullable|string',
            'type' => 'required|in:program kerja,kegiatan',
            'jenis' => 'required|in:harian,mingguan,bulanan,tahunan',
            'status' => 'required|in:terlaksana,tidak terlaksana',
            'tanggal' => 'required|date',
            'dokumen' => 'nullable|mimes:png,jpg,jpeg,pdf,docx|max:5048',
        ], [
            'dokumen.mimes' => 'Dokumen unggahan harus file dengan tipe png, jpg, jpeg, pdf, atau docx.',
            'dokumen.max' => 'Ukuran maksimal dokumen unggahan adalah 5MB.',
        ]);
        $user = Auth::user();
        if (!$user){
            return redirect()->route('login')->with('error','silahkan login terlebih dahulu');
        }

        if (is_null($user->organization_id)) {
            return redirect()->route('home')->with('error','kamu belum memiliki organisasi');
        }

        $program = Program::findOrFail($id);

        if ($program->organisasi_id !== $user->organization_id) {
            return redirect()->route('program')->with('error', 'Anda tidak memiliki izin untuk mengedit program ini.');
        }

        $program->nama = $request->nama;
        $program->description = $request->description;
        $program->type = $request->type;
        $program->jenis = $request->jenis;
        $program->status = $request->status;
        $program->tanggal = $request->tanggal;
        

        if ($request->hasFile('dokumen')) {
            $dokumenPath = $request->file('dokumen')->store('dokumen_program', 'public');
            $program->dokumen = $dokumenPath;
        }

        if ($program->save()) {
            return redirect()->route('program')->with('success', 'Data program berhasil diperbarui.');
        } else {
            return redirect()->route('program.edit', $id)->with('error', 'Terjadi kesalahan saat memperbarui data program.');
        }
    }
}
