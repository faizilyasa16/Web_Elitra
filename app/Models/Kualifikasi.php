<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kualifikasi extends Model
{
    use HasFactory;

    protected $table = 'kualifikasi_lowongan';

    protected $fillable = [
        'lowongan_id',
        'kualifikasi',
        'urutan',
    ];

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }
}
