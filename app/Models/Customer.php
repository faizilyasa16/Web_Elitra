<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    // kolom yang bisa diisi mass-assignment
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'no_hp',
        'cv',
        'skill',
        'experience',
        'linkedin',
    ];

    // Relasi ke tabel user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke tabel lowongan
    public function lowongan()
    {
        return $this->hasMany(Lowongan::class);
    }
    


}
