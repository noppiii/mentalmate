<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailPsikologSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure these records exist
        DB::table('metode_konsultasis')->insert([
            ['jenis_metode_konsultasi' => 'Online', 'created_at' => now(), 'updated_at' => now()],
            ['jenis_metode_konsultasi' => 'Offline', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('ulasans')->insert([
            [
                'rating' => 4,
                'isi' => 'Excellent service from the psychologist.',
                'mahasiswa_id' => 1, // Should match an existing record in mahasiswas
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rating' => 5,
                'isi' => 'Very helpful and understanding.',
                'mahasiswa_id' => 1, // Should match an existing record in mahasiswas
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more records as needed
        ]);

        // Now insert into detail_psikologs
        DB::table('detail_psikologs')->insert([
            [
                'psikolog_id' => 1,
                'rating' => 4,
                'harga_konsultasi' => 500000,
                'metode_konsultasi_id' => 1, // Should match an existing record in metode_konsultasis
                'ulasan_id' => 1, // Should match an existing record in ulasans
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'psikolog_id' => 2,
                'rating' => 5,
                'harga_konsultasi' => 600000,
                'metode_konsultasi_id' => 2, // Should match an existing record in metode_konsultasis
                'ulasan_id' => 2, // Should match an existing record in ulasans
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more records as needed
        ]);

        DB::table('bidang_psikologs')->insert([
            [
                'name' => 'Anak dan Remaja',
                'slug' => 'anak-dan-remaja',
                'description' => 'Spesialisasi dalam psikologi anak dan remaja.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Klinis',
                'slug' => 'klinis',
                'description' => 'Spesialisasi dalam psikologi klinis.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Perkawinan dan Keluarga',
                'slug' => 'perkawinan-dan-keluarga',
                'description' => 'Spesialisasi dalam psikologi perkawinan dan keluarga.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lain sesuai kebutuhan
        ]);

        // Insert mappings assuming detail_psikologs and bidang_psikologs records exist
        DB::table('bidang_psikolog_mappings')->insert([
            [
                'detail_psikolog_id' => 1,
                'bidang_psikolog_id' => 1,
            ],
            [
                'detail_psikolog_id' => 1,
                'bidang_psikolog_id' => 2,
            ],
            [
                'detail_psikolog_id' => 2,
                'bidang_psikolog_id' => 2,
            ],
            // Add more mappings as needed
        ]);
    }
}