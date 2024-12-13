<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = ['password'];

    protected $casts = [
        'password' => 'encrypted', // Jika Laravel mendukung encrypt cast
    ];

    public function perusahaan()
    {
        return $this->hasOne(Perusahaan::class, 'id_admin', 'id_admin');
    }

    // Gunakan setter untuk hash password secara otomatis
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
