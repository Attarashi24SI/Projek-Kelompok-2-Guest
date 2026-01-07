<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;

class RtSeeder extends Seeder
{
    public function run(): void
    {
        $wargaIds = Warga::pluck('warga_id')->toArray();

        foreach (Rw::all() as $rw) {

            for ($i=1; $i <= fake()->numberBetween(2,4); $i++) {
                Rt::create([
                    'rw_id' => $rw->rw_id,
                    'nomor_rt' => str_pad($i, 3, '0', STR_PAD_LEFT),
                    'ketua_rt_warga_id' => fake()->randomElement($wargaIds),
                    'keterangan' => "RT {$i} RW {$rw->nomor_rw}"
                ]);
            }

        }
    }
}
