<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat akun admin default
        User::updateOrCreate(
            ['email' => 'admin@solusikoneksi.com'], // Cek apakah email ini sudah ada
            [
                'name' => 'AdminSKA',
                'password' => Hash::make('password123'), // Password default
            ]
        );
    }
}
