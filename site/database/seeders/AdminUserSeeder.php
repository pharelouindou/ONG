<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@adeprog.org'],
            [
                'name'     => 'Administrateur ADéProG',
                'email'    => 'admin@adeprog.org',
                'password' => Hash::make('Adeprog2026!'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}
