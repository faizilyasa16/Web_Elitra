<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $table = 'lowongan';

    protected $fillable = [
        'img',
        'posisi',
        'alamat',
        'tipe',
        'pendidikan',
        'status',
        'perusahaan',
        'gaji',
    ];


    public function soalLowongan()
    {
        return $this->hasMany(SoalLowongan::class, 'lowongan_id');
    }
    public function kualifikasiLowongan()
    {
        return $this->hasMany(Kualifikasi::class, 'lowongan_id');
    }
    public function jobDescLowongan()
    {
        return $this->hasMany(JobDesc::class, 'lowongan_id');
    }
    public function benefitLowongan()
    {
        return $this->hasMany(Benefit::class, 'lowongan_id');
    }
    public function jawaban()
    {
        return $this->hasMany(JawabanSoalLowongan::class);
    }
}
