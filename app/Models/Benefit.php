<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use HasFactory;

    protected $table = 'benefit_lowongan';

    protected $fillable = [
        'lowongan_id',
        'benefit',
        'urutan',
    ];

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }

}
