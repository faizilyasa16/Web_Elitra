<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDesc extends Model
{
    use HasFactory;

    protected $table = 'job_desc_lowongan';

    protected $fillable = [
        'lowongan_id',
        'deskripsi',
        'urutan'
    ];

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }
}
