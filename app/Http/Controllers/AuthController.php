<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\AdminPayrollPerusahaan;
use App\Models\PayrollAdmin;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Menangani login pengguna
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required|in:admin_payroll_perusahaan,admin,payroll_admin', // Pilih role
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        switch ($request->role) {
            case 'admin_payroll_perusahaan':
                $user = AdminPayrollPerusahaan::where('username', $request->username)->first();
                break;
            case 'admin':
                $user = Admin::where('username', $request->username)->first();
                break;
            case 'payroll_admin':
                $user = PayrollAdmin::where('username', $request->username)->first();
                break;
            default:
                return back()->withErrors(['role' => 'Invalid role']);
        }

        if ($user && Auth::guard($request->role)->attempt($credentials)) {
            if ($request->role == 'admin_payroll_perusahaan') {
                return redirect()->route('adminperusahaan.index');
            } elseif ($request->role == 'admin') {
                return redirect()->route('adminkaryawan.index');
            } elseif ($request->role == 'payroll_admin') {
                return redirect()->route('perusahaan.index');
            }
        }

        return back()->withErrors(['username' => 'Invalid credentials']);
    }


    // Menangani logout
    public function logout(Request $request)
    {
        Auth::guard($request->role)->logout();
        return redirect('/');
    }
}