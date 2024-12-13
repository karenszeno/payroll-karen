<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayrollAdminDashboardController extends Controller
{
    public function index()
    {
        return view('payrolladmin.dashboard'); // Buat view dashboard admin payroll
    }
}
