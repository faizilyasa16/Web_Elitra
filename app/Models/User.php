<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user'; // Nama tabel

    protected $fillable = [
        'username',  // Ganti 'name' menjadi 'nama'
        'email',
        'hp',
        'foto',
        'role',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
    
    public function jawabanlowongan()
    {
        return $this->hasMany(JawabanSoalLowongan::class);
    }
    public function sudahKontrak()
    {
        return $this->hasOne(SudahKontrak::class, 'user_id');
    }



}
