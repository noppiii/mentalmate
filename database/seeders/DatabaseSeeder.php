<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MahasiswaSeeder::class,
            AdminSeeder::class,
            PsikologSeeder::class,
            DetailPsikologSeeder::class,
            ArtikelSeeder::class,
            SiteIdentitySeeder::class,
            // Tambahkan seeder lain di sini
        ]);
    }
}
