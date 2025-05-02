<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalLowongan extends Model
{
    use HasFactory;

    protected $table = 'soal_lowongan';

    protected $fillable = [
        'lowongan_id',
        'customer_id',
        'soal',
    ];

    /**
     * Relasi ke model Lowongan
     */
    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }

    /**
     * Relasi ke model Customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
