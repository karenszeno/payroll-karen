<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Perusahaan;


class DashboardController extends Controller
{
    // Menampilkan Dashboard untuk Admin Payroll Perusahaan
    public function adminPayrollDashboard()
    {
        if (Auth::guard('adminpayrollperusahaan')->check()) {
            return view('dashboard.admin-payroll');
        }

        session()->flash('error', 'Anda harus login sebagai Admin Payroll Perusahaan.');
        return redirect()->route('login');
    }

    // Menampilkan Dashboard untuk Admin
    public function adminDashboard()
    {
        if (Auth::guard('admin')->check()) {
            return view('dashboard.admin');
        }

        session()->flash('error', 'Anda harus login sebagai Admin.');
        return redirect()->route('login');
    }

    // Menampilkan Dashboard untuk Payroll Admin
    public function payrollAdminDashboard()
    {
        if (Auth::guard('payrolladmin')->check()) {
            $perusahaans = Perusahaan::all();
            return view('adminperusahaan.index', compact('perusahaans'));
        }

        session()->flash('error', 'Anda harus login sebagai Payroll Admin.');
        return redirect()->route('login');
    }

    // Menampilkan halaman utama dashboard (default)
    public function index()
{
    $perusahaans = Perusahaan::all(); // Ambil semua data perusahaan
    return view('home.dashboard', compact('perusahaans'));
}
}
