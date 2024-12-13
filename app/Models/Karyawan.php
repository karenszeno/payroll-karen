<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';  
    protected $primaryKey = 'id_karyawan'; 
    public $timestamps = false; 

    protected $fillable = [
        'nama_karyawan',
        'email',
        'jabatan',
        'gaji_pokok',
        'no_rekening',
        'nama_bank',
        'tanggal_penggajian',
        'id_perusahaan',
        'nama_perusahaan',
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan', 'id_perusahaan');
    }
}
