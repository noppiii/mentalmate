<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            [
                'nama' => 'Admin One',
                'email' => 'admin1@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'telp' => '08123456789',
                'status' => 'verified',
                'remember_token' => Str::random(10),
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Admin Two',
                'email' => 'admin2@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'telp' => '08123456788',
                'status' => 'verified',
                'remember_token' => Str::random(10),
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lain sesuai kebutuhan
        ]);
    }
}