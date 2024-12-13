<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Models\Perusahaan;

class AdminKaryawanController extends Controller
{
    public function index(Perusahaan $perusahaan)
    {
        $karyawans = $perusahaan->karyawans;
        return view('adminkaryawan.index', compact('karyawans', 'perusahaan'));
    }

    public function create(Perusahaan $perusahaan)
    {
        return view('adminkaryawan.create', compact('perusahaan'));
    }

    public function store(Request $request, Perusahaan $perusahaan)
    {
        $request->validate([
            'nama_karyawan' => 'required|string',
            'email' => 'required|email',
            'jabatan' => 'required|string',
        ]);

        $perusahaan->karyawans()->create($request->all());

        return redirect()->route('adminkaryawan.index', $perusahaan->id_perusahaan);
    }

    public function edit(Perusahaan $perusahaan, $id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('adminkaryawan.edit', compact('perusahaan', 'karyawan'));
    }

    public function update(Request $request, Perusahaan $perusahaan, $id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->all());

        return redirect()->route('adminkaryawan.index', ['perusahaan' => $perusahaan->id_perusahaan]);
    }


    public function destroy(Perusahaan $perusahaan, $id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('adminkaryawan.index', $perusahaan->id_perusahaan);
    }

}
