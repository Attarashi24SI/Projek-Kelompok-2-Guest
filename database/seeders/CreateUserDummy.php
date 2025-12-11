<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
class CreateUserDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 50) as $i) {
            DB::table('users')->insert([
                'name'      => $faker->name(),
                'email'     => $faker->unique()->safeEmail(),
                'password'  => Hash::make('password123'), // password default
                'created_at'=> now(),
                'updated_at'=> now(),
            ]);
        }
    }
}
