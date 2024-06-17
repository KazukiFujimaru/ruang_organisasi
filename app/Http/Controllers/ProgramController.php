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
            'status' => 'required|in:terlaksana,tidak terlaksan',
            'tanggal' => 'required|date',
            'dokumen' => 'nullable|mimes:image,pdf|max:2048',
            

        ]);

        $user = Auth::user();
        if (!$user){
            return redirect()->route('login')->with('error','silahkan login terlebih dahulu');

        }

        if (is_null($user->organization_id)){
            return redirect()->route('home')->with('error', 'Anda tidak tergabung di organisasi');

        }

        $program = new Program([
            'nama' => $request->nama,
            'description' => $request->description,
            'type' => $request->type,
            'jenis' => $request->jenis,
            'status' => $request->status,
            'tanggal' => $request->tanggal,
            'organisasi_id'=> $user->organization_id,
            'dokumen' => $request->file('dokumen') ? $request->file('dokumen')->store('dokumen_program') : null,
        ]);

        $program->save();
        return redirect()->route('program')->with('success', 'Data program berhasil ditambahkan.');
    }
}
