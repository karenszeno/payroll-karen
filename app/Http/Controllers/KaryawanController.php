<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Perusahaan;
use App\Models\Admin;
use App\Models\AdminPayrollPerusahaan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index($perusahaanId)
{
    $perusahaan = Perusahaan::findOrFail($perusahaanId);
    $karyawan = $perusahaan->karyawan;  

    return view('karyawan.index', compact('karyawan', 'perusahaan'));
}

public function create($perusahaanId)
{
    $perusahaan = Perusahaan::findOrFail($perusahaanId);

    return view('karyawan.create', compact('perusahaan'));
}


public function store(Request $request, $perusahaanId)
{
    $request->validate([
        'nama_karyawan' => 'required|max:50',
        'email' => 'required|email|max:50',
        'jabatan' => 'required|max:20',
        'nama_bank' => 'required|max:20',  // Jika perlu
        'no_rekening' => 'required|max:20',  // Jika perlu
        'tanggal_penggajian' => 'required|date', // Jika perlu
    ]);

    $perusahaan = Perusahaan::findOrFail($perusahaanId);

    $karyawan = new Karyawan([
        'id_perusahaan' => $perusahaan->id_perusahaan,
        'nama_karyawan' => $request->nama_karyawan,
        'email' => $request->email,
        'jabatan' => $request->jabatan,
        'nama_bank' => $request->nama_bank,  // Sesuaikan dengan inputan
        'no_rekening' => $request->no_rekening,  // Sesuaikan dengan inputan
        'tanggal_penggajian' => $request->tanggal_penggajian, // Sesuaikan dengan inputan
    ]);

    $karyawan->save();

    return redirect()->route('karyawan.index', $perusahaan->id_perusahaan)->with('success', 'Karyawan berhasil ditambahkan.');
}

public function edit($perusahaanId, $karyawanId)
{
    $perusahaan = Perusahaan::findOrFail($perusahaanId);
    $karyawan = Karyawan::findOrFail($karyawanId);

    return view('karyawan.edit', compact('perusahaan', 'karyawan'));
}

public function update(Request $request, $perusahaanId, $karyawanId)
{
    $request->validate([
        'nama_karyawan' => 'required|max:50',
        'email' => 'required|email|max:50',
        'jabatan' => 'required|max:20',
    ]);

    $perusahaan = Perusahaan::findOrFail($perusahaanId);
    $karyawan = Karyawan::findOrFail($karyawanId);

    $karyawan->update([
        'nama_perusahaan' => $perusahaan->nama_perusahaan,
        'nama_karyawan' => $request->nama_karyawan,
        'email' => $request->email,
        'jabatan' => $request->jabatan,
    ]);

    return redirect()->route('karyawan.index', $perusahaan->id_perusahaan)->with('success', 'Karyawan berhasil diperbarui.');
}

public function destroy($perusahaanId, $karyawanId)
{
    $perusahaan = Perusahaan::findOrFail($perusahaanId);
    $karyawan = Karyawan::findOrFail($karyawanId);
    $karyawan->delete();

    return redirect()->route('karyawan.index', $perusahaan->id_perusahaan)->with('success', 'Karyawan berhasil dihapus.');
}

public function exportAllPdf()
    {
        // Ambil semua data karyawan
        $karyawan = Karyawan::all();

        // Ambil data perusahaan (misalnya perusahaan pertama)
        $perusahaan = Perusahaan::first();

        // Generate PDF menggunakan view yang sudah ada
        $pdf = PDF::loadView('karyawan.pdf', compact('karyawan', 'perusahaan'));

        // Mengunduh file PDF dengan nama 'Daftar_Karyawan.pdf'
        return $pdf->download('Daftar_Karyawan.pdf');
    }

}
