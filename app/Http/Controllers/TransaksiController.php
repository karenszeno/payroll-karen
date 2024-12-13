<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Karyawan;
use App\Models\Payroll;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $perusahaans = Perusahaan::with('karyawan')->get();
        return view('transaksi.index', compact('perusahaans'));
    }

    
    public function showPayroll($id_perusahaan)
    {
        // Menampilkan daftar payroll untuk perusahaan tertentu
        $payrolls = Payroll::where('perusahaan_id', $id_perusahaan)->get();
        $perusahaan = Perusahaan::findOrFail($id_perusahaan);

        return view('transaksi.payroll', compact('payrolls', 'perusahaan'));
    }

    public function processPayroll($id_karyawan)
    {
        // Cari data karyawan
        $karyawan = Karyawan::findOrFail($id_karyawan);
        $perusahaan = $karyawan->perusahaan;

        // Cek apakah dana perusahaan cukup
        if ($perusahaan->jumlah_dana_di_bank >= $karyawan->gaji_pokok) {
            // Kurangi jumlah dana di bank
            $perusahaan->jumlah_dana_di_bank -= $karyawan->gaji_pokok;
            $perusahaan->save();

            // Tandai karyawan telah digaji (opsional, tambahkan kolom `status_penggajian` jika diperlukan)
            $karyawan->tanggal_penggajian = now();
            $karyawan->save();

            return redirect()->back()->with('success', 'Penggajian berhasil diproses.');
        }

        return redirect()->back()->with('error', 'Dana di bank tidak cukup untuk memproses penggajian.');
    }
}
