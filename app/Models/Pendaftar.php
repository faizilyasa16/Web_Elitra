<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftar';

    protected $fillable = [
        'customer_id',
        'lowongan_id',
        'jawaban_soal_id',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }
    public function jawabanSoal()
    {
        return $this->hasMany(JawabanSoalLowongan::class, 'customer_id', 'customer_id');
    }
    public function user()
    {
        return $this->customer->user(); // Mengambil user melalui relasi customer
    }
    public function history()
    {
        return $this->hasMany(HistoryPendaftar::class);
    }

}
