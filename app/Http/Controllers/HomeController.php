<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Data untuk total karyawan
        $totalKaryawan = Karyawan::count();

        // Data untuk total transaksi (misalnya transaksi yang terjadi pada bulan terakhir)
        $totalTransaksi = Transaksi::whereMonth('tanggal_transaksi', now()->month)
            ->count();

        // Data untuk grafik transaksi per bulan (misalnya 12 bulan terakhir)
        $transaksiPerBulan = Transaksi::selectRaw('MONTH(tanggal_transaksi) as bulan, COUNT(*) as total')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $bulan = [];
        $jumlahTransaksi = [];

        foreach ($transaksiPerBulan as $transaksi) {
            $bulan[] = $transaksi->bulan;
            $jumlahTransaksi[] = $transaksi->total;
        }

        return view('home', compact('totalKaryawan', 'totalTransaksi', 'bulan', 'jumlahTransaksi'));
    }
}
