<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisasi;
use App\Models\Keanggotaan;
use Illuminate\Support\Facades\Auth;

class OrganisasiController extends Controller
{
    public function choose()
    {
        return view('organisasi.choose');
    }

    public function create()
    {
        return view('organisasi.create');
    }

    public function store(Request $request)
    {
        $organisasi = Organisasi::create($request->all());
        $user = Auth::user();
        $user->organization_id = $organisasi->id;
        $user->save();

        return redirect()->route('dashboard');
    }

    public function joinForm()
    {
        $organisasis = Organisasi::all();
        return view('organisasi.join', compact('organisasis'));
    }

    public function join(Request $request)
    {
        $user = Auth::user();
        $user->organization_id = $request->organization_id;
        $user->save();

        return redirect()->route('dashboard');
    }
}
