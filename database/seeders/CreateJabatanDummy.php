<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class CreateJabatanDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        // ambil semua lembaga_id dari tabel lembaga
        $lembagaIds = DB::table('lembaga')->pluck('lembaga_id');

        foreach ($lembagaIds as $id) {
            // setiap lembaga dapat 3 jabatan
            foreach (range(1, 3) as $i) {
                DB::table('jabatan_lembaga')->insert([
                    'lembaga_id'     => $id,
                    'nama_jabatan'   => $faker->jobTitle,
                    'level'          => rand(1,5),
                ]);
            }
        }
    }
}
