<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class SudahKontrak extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'pekerja'; // Nama tabel
    
    protected $fillable = [
        'user_id',
        'nama',  // Ganti 'name' menjadi 'nama'
        'posisi_dikontrak',
        'tanggal_mulai_kontrak',
        'email',
        'pt',
        'lama_kontrak',
        'upah_kontrak',
        'tanggal_akhir_kontrak',
        'status_kontrak',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
