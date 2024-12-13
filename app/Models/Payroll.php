<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $table = 'payroll';

    protected $fillable = [
        'id_perusahaan', 'id_karyawan', 'nama_karyawan', 'jabatan', 'gaji_pokok',
        'jmlh_gaji', 'tgl_penggajian', 'nama_bank', 'no_rekening', 'nama_pemilik',
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan');
    }
}
