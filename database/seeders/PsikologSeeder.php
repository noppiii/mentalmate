<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PsikologSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('psikologs')->insert([
            [
                'nama' => 'Psikolog One',
                'email' => 'psikolog1@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'status' => 'verified',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1980-01-01',
                'asal_universitas' => 'Universitas Indonesia',
                'program_studi' => 'Psikologi',
                'tahun_lulus' => 2004,
                'tempat_praktik' => 'Jakarta',
                'no_str' => 123456789,
                'dokumen_cv' => 'path/to/cv1.pdf',
                'dokumen_ijazah' => 'path/to/ijazah1.pdf',
                'dokumen_str_aktif' => 'path/to/str_aktif1.pdf',
                'dokumen_izin_praktik' => 'path/to/izin_praktik1.pdf',
                'remember_token' => Str::random(10),
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Psikolog Two',
                'email' => 'psikolog2@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'status' => 'verified',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1985-05-15',
                'asal_universitas' => 'Universitas Gadjah Mada',
                'program_studi' => 'Psikologi',
                'tahun_lulus' => 2008,
                'tempat_praktik' => 'Bandung',
                'no_str' => 987654321,
                'dokumen_cv' => 'path/to/cv2.pdf',
                'dokumen_ijazah' => 'path/to/ijazah2.pdf',
                'dokumen_str_aktif' => 'path/to/str_aktif2.pdf',
                'dokumen_izin_praktik' => 'path/to/izin_praktik2.pdf',
                'remember_token' => Str::random(10),
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lain sesuai kebutuhan
        ]);
    }
}