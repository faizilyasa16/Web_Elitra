<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanSoalLowongan extends Model
{
    use HasFactory;

    protected $table = 'jawaban_soal';

    protected $fillable = [
        'soal_lowongan_id',
        'customer_id',
        'letter',
        'foto_ktp',
        'experience',
        'pendidikan',
        'harapan_gaji',
        'jawaban',
    ];

    public function soalLowongan()
    {
        return $this->belongsTo(SoalLowongan::class, 'soal_lowongan_id');
    }
    

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }
    public function user()
    {
        // relasi indirect: dari jawaban_soal -> customer -> user
        return $this->hasOneThrough(
            User::class,
            Customer::class,
            'id',         // Foreign key on Customer table...
            'id',         // Foreign key on User table...
            'customer_id', // Local key on JawabanSoal table...
            'user_id'     // Local key on Customer table...
        );
    }
}
