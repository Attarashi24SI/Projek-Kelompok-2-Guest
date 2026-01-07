<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AnggotaLembaga;
use App\Models\Lembaga;
use App\Models\Warga;
use App\Models\JabatanLembaga;

class AnggotaLembagaSeeder extends Seeder
{
    public function run(): void
    {
        $wargaIds = Warga::pluck('warga_id')->toArray();

        foreach (Lembaga::all() as $lembaga) {

            $jabatan = JabatanLembaga::where('lembaga_id', $lembaga->lembaga_id)->get();

            foreach ($jabatan as $j) {
                AnggotaLembaga::create([
                    'lembaga_id' => $lembaga->lembaga_id,
                    'warga_id' => fake()->randomElement($wargaIds),
                    'jabatan_id' => $j->jabatan_id,
                    'tgl_mulai' => fake()->date(),
                    'tgl_selesai' => null,
                ]);
            }
        }
    }
}
