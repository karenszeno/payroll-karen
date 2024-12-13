<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\AdminDashboardController;
// use App\Http\Controllers\AdminPayrollPerusahaanDashboardController;
// use App\Http\Controllers\PayrollAdminDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AdminKaryawanController;
use App\Http\Controllers\AdminPayrollPerusahaanController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login'); // Arahkan ke halaman login
})->name('logout');

// Rute untuk Admin Payroll Perusahaan
Route::get('/dashboard/admin-payroll', [DashboardController::class, 'adminPayrollDashboard'])
    ->middleware('auth:adminpayrollperusahaan');

// Rute untuk Admin
Route::get('/dashboard/admin', [DashboardController::class, 'adminDashboard'])
    ->middleware('auth:admin');

// Rute untuk Payroll Admin
Route::get('/dashboard/payroll-admin', [DashboardController::class, 'payrollAdminDashboard'])
    ->middleware('auth:payrolladmin');


Route::get('/home', [HomeController::class, 'dashboard'])->name('dashboard');

Route::resource('perusahaan', PerusahaanController::class);
// Route::prefix('perusahaan/{perusahaanId}')->group(function () {
//     Route::resource('karyawan', KaryawanController::class)->except(['show']);
// });
Route::get('perusahaan/{perusahaanId}/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');

Route::get('/perusahaan/{id}', [PerusahaanController::class, 'show'])->name('perusahaan.show');

Route::get('/perusahaan/{id}/export-pdf', [PerusahaanController::class, 'exportPdf'])->name('perusahaan.export_pdf');

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/{id_perusahaan}/karyawan', [TransaksiController::class, 'showPayroll'])->name('transaksi.payroll');

Route::prefix('admin-perusahaan/{perusahaan}')->group(function () {
    Route::resource('adminkaryawan', AdminKaryawanController::class);
});

Route::prefix('admin-payroll/{perusahaan}')->group(function () {
    Route::resource('adminperusahaan', AdminPayrollPerusahaanController::class);
});

Route::get('/karyawan/export-pdf', [KaryawanController::class, 'exportAllPdf'])->name('karyawan.exportPdf');


Route::post('/transaksi/process/{id_karyawan}', [TransaksiController::class, 'processPayroll'])->name('transaksi.processPayroll');
