<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
class CreateAnggotaLembagaDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Ambil semua ID yang sudah ada
        $lembagaIDs = DB::table('lembaga')->pluck('lembaga_id')->toArray();
        $wargaIDs = DB::table('warga')->pluck('warga_id')->toArray();
        $jabatanIDs = DB::table('jabatan_lembaga')->pluck('jabatan_id')->toArray();

        foreach (range(1, 50) as $i) {
            DB::table('anggota_lembaga')->insert([
                'lembaga_id' => $faker->randomElement($lembagaIDs),
                'warga_id'   => $faker->randomElement($wargaIDs),
                'jabatan_id' => $faker->randomElement($jabatanIDs),
                'tgl_mulai'  => $faker->date(),
                'tgl_selesai' => $faker->optional()->date(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
