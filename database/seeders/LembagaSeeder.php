<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lembaga;

class LembagaSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Lembaga::create([
                'nama_lembaga' => 'Lembaga ' . $i,
                'deskripsi' => fake()->sentence(10),
                'kontak' => fake()->phoneNumber(),
            ]);
        }
    }
}
