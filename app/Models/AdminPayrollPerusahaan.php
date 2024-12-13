<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminPayrollPerusahaan extends Authenticatable
{
    use HasFactory;

    protected $table = 'admin_payroll_perusahaan';
    protected $primaryKey = 'id_admin_payroll_perusahaan';
    public $timestamps = false;

    protected $fillable = ['username', 'password'];
    protected $hidden = ['password'];
}
