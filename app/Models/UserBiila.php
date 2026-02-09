<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;

class UserBiila extends Authenticatable
{
    use Notifiable;

    protected $table = 'user_sesendok_biila';  // ← ini yang penting
    // Matikan timestamps default (created_at / updated_at)
    public $timestamps = false;

    // Ganti nama kolom timestamps custom
    const CREATED_AT = 'tgl_daftar';   // kolom untuk "dibuat"
    const UPDATED_AT = 'tgl_login';    // kolom untuk "diupdate" / terakhir login
    protected $primaryKey = 'id';  // sesuaikan jika primary key bukan id

    protected $fillable = [
        'username',
        'password',
        'nama',
        'nip',
        'email',
        'level',
        'active', // sesuaikan dengan kolom di tabelmu
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
    'email_verified_at' => 'datetime',
    'password'          => 'hashed',
    'tgl_daftar'        => 'datetime',  // tambahkan ini
    'tgl_login'         => 'datetime',  // tambahkan ini
];
}
