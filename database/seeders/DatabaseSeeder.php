<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        User::create([
            'username' => 'Admin',
            'email' => 'admin@gmail.com', // Ganti dengan email yang unik
            'role' => 'superadmin',
            'password' => bcrypt('password'),
            'hp' => '081234567890',
        ]);
    }
}
