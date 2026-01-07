<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lembaga;
use App\Models\JabatanLembaga;

class JabatanLembagaSeeder extends Seeder
{
    public function run(): void
    {
        $jabatanList = [
            ['Ketua', 1],
            ['Wakil Ketua', 2],
            ['Sekretaris', 3],
            ['Bendahara', 4],
            ['Anggota', 5],
        ];

        foreach (Lembaga::all() as $lembaga) {
            foreach ($jabatanList as $j) {
                JabatanLembaga::create([
                    'lembaga_id' => $lembaga->lembaga_id,
                    'nama_jabatan' => $j[0],
                    'level' => $j[1],
                ]);
            }
        }
    }
}
