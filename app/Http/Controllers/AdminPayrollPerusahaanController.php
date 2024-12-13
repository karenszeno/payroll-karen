<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class AdminPayrollPerusahaanController extends Controller
{
    public function index(Perusahaan $perusahaan)
    {
        $karyawan = $perusahaan->karyawan; // Mengambil karyawan berdasarkan relasi
        return view('adminperusahaan.index', compact('karyawan', 'perusahaan'));
    }

    public function create(Perusahaan $perusahaan)
    {
        return view('adminperusahaan.create', compact('perusahaan'));
    }

    public function store(Request $request, Perusahaan $perusahaan)
    {
        $gajiPokok = [
            'Manager' => 1000000,
            'Staff' => 5000000,
            'Supervisor' => 7000000,
            'HRD' => 60000.00,
            'Finance' => 80000.00,
        ];

        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'email' => 'required|email|unique:karyawan,email',
            'jabatan' => 'required|string',
            'gaji_pokok' => 'required|numeric|min:0', 
            'no_rekening' => 'required|numeric',
            'nama_bank' => 'required|string',
            'tanggal_penggajian' => 'required|date',          
        ]);

        $gaji = $gajiPokok[$request->jabatan] ??

        $gajiPokok = [
            'Manager' => 100000.00,
            'Staff' => 50000.00,
            'Supervisor' => 70000.00,
            'HRD' => 60000.00,
            'Finance' => 80000.00,
        ];
        
        // Jika `gaji_pokok` tidak terkirim, set berdasarkan jabatan
        $gaji = $request->input('gaji_pokok') ?? ($gajiPokok[$request->jabatan] ?? 0);
        $data = $request->all();
        $data['gaji_pokok'] = $gaji;
        
        Karyawan::create($data);
        
        return redirect()->route('adminperusahaan.index', $perusahaan->id_perusahaan)
                         ->with('success', 'Karyawan berhasil ditambahkan.');
        
    }

    public function edit(Perusahaan $perusahaan, $id)
    {
        $karyawan = $perusahaan->karyawan()->findOrFail($id); // Mengambil karyawan berdasarkan relasi
        return view('adminperusahaan.edit', compact('perusahaan', 'karyawan'));
    }

    public function update(Request $request, Perusahaan $perusahaan, $id)
    {
        $karyawan = $perusahaan->karyawan()->findOrFail($id); // Pastikan karyawan terkait perusahaan
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'email' => 'required|email|unique:karyawan,email,' . $karyawan->id_karyawan,
            'jabatan' => 'required|string',
            'gaji_pokok' => 'required|numeric|min:0',
            'no_rekening' => 'required|numeric',
            'nama_bank' => 'required|string',
            'tanggal_penggajian' => 'required|date',
        ]);

        $karyawan = $perusahaan->karyawan()->findOrFail($id);
        $karyawan->update($request->all());

        return redirect()->route('adminperusahaan.index', $perusahaan->id_perusahaan)
                         ->with('success', 'Data karyawan berhasil diperbarui.');
    }

    public function destroy(Perusahaan $perusahaan, $id)
    {
        $karyawan = $perusahaan->karyawan()->findOrFail($id);
        $karyawan->delete();

        return redirect()->route('adminperusahaan.index', $perusahaan->id_perusahaan)
                         ->with('success', 'Karyawan berhasil dihapus.');
    }
}