<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class CreateWargaDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 100) as $i) {
            DB::table('warga')->insert([
                'no_ktp'     => $faker->nik(), // nomor KTP Indonesia
                'nama'       => $faker->name,
                'gender'     => $faker->randomElement(['Pria', 'Wanita']),
                'agama'      => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                'pekerjaan'  => $faker->jobTitle,
                'telp'       => $faker->phoneNumber,
                'email'      => $faker->unique()->safeEmail,
            ]);
        }
    }
}

