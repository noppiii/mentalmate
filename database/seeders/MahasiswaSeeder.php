<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswas')->insert([
            [
                'nama' => 'John Doe',
                'email' => 'johndoe@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'status' => 'verified',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-01-01',
                'nama_universitas' => 'Universitas Indonesia',
                'fakultas' => 'Fakultas Teknik',
                'program_studi' => 'Teknik Informatika',
                'nomor_induk_mahasiswa' => 12345678,
                'tahun_masuk' => 2018,
                'semester' => 6,
                'dokumen_ktm' => 'ktm_johndoe.pdf',
                'dokumen_transkip_nilai' => 'transkip_johndoe.pdf',
                'remember_token' => Str::random(10),
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lain sesuai kebutuhan
        ]);
    }
}