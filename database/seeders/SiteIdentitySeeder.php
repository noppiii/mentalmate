<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteIdentitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('site_identities')->insert([
            'name_website' => 'MyWebsite',
            'email' => 'info@mywebsite.com',
            'logo' => 'logo.png',
            'contact' => '+621938039749',
            'address' => '123 Jalan Utama, Kota Example',
            'social_instagram' => 'https://instagram.com/mywebsite',
            'social_facebook' => 'https://facebook.com/mywebsite',
            'social_linkedin' => 'https://linkedin.com/company/mywebsite',
            'social_x' => 'https://x.com/mywebsite',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
