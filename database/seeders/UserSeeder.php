<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Attarashi',
            'email' => 'attar@attar',
            'password' => Hash::make('attar123'), // password
            'role' => 'admin',
        ]);
    }
}
