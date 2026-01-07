<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warga;

class WargaSeeder extends Seeder
{
    public function run(): void
    {
        for ($i=1; $i <= 100; $i++) {
            Warga::create([
                'no_ktp' => fake()->numerify('################'),
                'nama' => fake()->name(),
                'gender' => fake()->randomElement(['Pria','Wanita']),
                'agama' => fake()->randomElement(['Islam','Kristen','Katolik','Hindu','Buddha']),
                'pekerjaan' => fake()->jobTitle(),
                'telp' => fake()->phoneNumber(),
                'email' => fake()->unique()->safeEmail(),
            ]);
        }
    }
}
