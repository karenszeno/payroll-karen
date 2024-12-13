<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'perusahaan';
    protected $primaryKey = 'id_perusahaan';
    public $timestamps = false;

    protected $fillable = [
        'id_admin',
        'id_admin_payroll_perusahaan',
        'nama_perusahaan',
        'alamat',
        'email',
        'telepon',
        'jumlah_karyawan',
        'jumlah_dana_di_bank',
    ];

    public function adminPayrollPerusahaan()
    {
        return $this->belongsTo(AdminPayrollPerusahaan::class, 'id_admin_payroll_perusahaan', 'id');
    }

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'id_perusahaan');
    }

    public function getJumlahDanaDiBankFormattedAttribute()
    {
        return 'Rp ' . number_format($this->jumlah_dana_di_bank, 0, ',', '.');
    }

    public function payrolls()
    {
        return $this->hasMany(Payroll::class, 'id_perusahaan', 'id_perusahaan');
    }

}
