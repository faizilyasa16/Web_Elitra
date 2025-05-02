<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPendaftar extends Model
{
    use HasFactory;

    protected $table = 'history_pendaftar';

    protected $fillable = [
        'pendaftar_id',
        'status_lama',
        'status_baru',
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }
}
