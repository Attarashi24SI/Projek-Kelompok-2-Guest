<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PerangkatDesa;
use App\Models\Warga;

class PerangkatDesaSeeder extends Seeder
{
    public function run(): void
    {
        $wargaIds = Warga::pluck('warga_id')->toArray();

        $jabatan = [
            'Kepala Desa',
            'Sekretaris Desa',
            'Bendahara',
            'Kasi Pemerintahan',
            'Kasi Pelayanan'
        ];

        foreach ($jabatan as $j) {
            PerangkatDesa::create([
                'warga_id' => fake()->randomElement($wargaIds),
                'jabatan' => $j,
                'nip' => fake()->numerify('################'),
                'kontak' => fake()->phoneNumber(),
                'periode_mulai' => fake()->date(),
                'periode_selesai' => null
            ]);
        }
    }
}
