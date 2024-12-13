<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use PDF;

class PerusahaanController extends Controller
{

    public function index(Request $request)
    {
        $query = Perusahaan::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nama_perusahaan', 'like', '%' . $search . '%');
        }

        $perusahaans = $query->with('payrolls')
        ->get()
        ->map(function ($perusahaan) {
            
            $totalGaji = $perusahaan->payrolls->sum('jmlh_gaji');
            
            
            $perusahaan->sisa_dana = $perusahaan->jumlah_dana_di_bank - $totalGaji;

            return $perusahaan;
        });

        return view('perusahaan.index', compact('perusahaans'));
    }

    public function create()
    {
        return view('perusahaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_admin' => 'required|string|max:255',
            'id_admin_payroll_perusahaan' => 'required|string|max:255',
            'nama_perusahaan' => 'required|max:25',
            'alamat' => 'required|max:100',
            'email' => 'required|email|max:50',
            'telepon' => 'required|digits_between:10,12',
            'jumlah_karyawan' => 'required|integer',
            'jumlah_dana_di_bank' => 'required|numeric|min:0',
        ]);

        Perusahaan::create($request->all());

        return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil ditambahkan.');
    }

    public function edit(Perusahaan $perusahaan)
    {
        return view('perusahaan.edit', compact('perusahaan'));
    }

    public function update(Request $request, Perusahaan $perusahaan)
    {
        $request->validate([
            'id_admin' => 'required|string|max:255',
            'id_admin_payroll_perusahaan' => 'required|string|max:255',
            'nama_perusahaan' => 'required|max:25',
            'alamat' => 'required|max:100',
            'email' => 'required|email|max:50',
            'telepon' => 'required|digits_between:10,12',
            'jumlah_karyawan' => 'required|integer',
            'jumlah_dana_di_bank' => 'required|numeric|min:0',
        ]);

        $perusahaan->update($request->all());

        return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil diperbarui.');
    }

    public function destroy(Perusahaan $perusahaan)
    {
        $perusahaan->delete();

        return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil dihapus.');
    }

    public function show($perusahaanId)
    {
        $perusahaan = Perusahaan::findOrFail($perusahaanId);

        return view('perusahaan.show', compact('perusahaan'));
    }
    public function exportPdf($id)
{
    $perusahaan = Perusahaan::findOrFail($id); // Ambil data perusahaan berdasarkan ID

    // Load view untuk PDF
    $pdf = PDF::loadView('perusahaan.pdf', compact('perusahaan'));

    // Unduh file PDF
    return $pdf->download('Detail_Perusahaan_' . $perusahaan->nama_perusahaan . '.pdf');
}


}
