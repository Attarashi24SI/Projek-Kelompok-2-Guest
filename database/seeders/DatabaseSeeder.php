<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\RtSeeder;
use Database\Seeders\RwSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\WargaSeeder;
use Database\Seeders\LembagaSeeder;
use Database\Seeders\PerangkatDesaSeeder;
use Database\Seeders\AnggotaLembagaSeeder;
use Database\Seeders\JabatanLembagaSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // contoh tetap bikin user default (optional)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // ====== Tambahkan ini ======
        $this->call([
            WargaSeeder::class,
            RwSeeder::class,
            RtSeeder::class,
            PerangkatDesaSeeder::class,
            LembagaSeeder::class,
            JabatanLembagaSeeder::class,
            AnggotaLembagaSeeder::class,
        ]);
    }

}
