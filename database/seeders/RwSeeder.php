<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rw;
use App\Models\Warga;

class RwSeeder extends Seeder
{
    public function run(): void
    {
        $wargaIds = Warga::pluck('warga_id')->toArray();

        for ($i=1; $i <= 5; $i++) {
            Rw::create([
                'nomor_rw' => str_pad($i, 3, '0', STR_PAD_LEFT),
                'ketua_rw_warga_id' => fake()->randomElement($wargaIds),
                'keterangan' => 'RW ' . $i
            ]);
        }
    }
}
