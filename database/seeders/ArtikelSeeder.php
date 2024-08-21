<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tag_artikels')->insert([
            [
                'nama' => 'Health',
                'slug' => 'health',
                'content' => 'Articles related to health.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Psychology',
                'slug' => 'psychology',
                'content' => 'Articles related to psychology.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Ensure these records exist in kategori_artikels
        DB::table('kategori_artikels')->insert([
            [
                'nama' => 'Tips',
                'slug' => 'tips',
                'content' => 'Tips and advice articles.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Research',
                'slug' => 'research',
                'content' => 'Research and study articles.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Insert into artikels
        DB::table('artikels')->insert([
            [
                'name' => 'Understanding Mental Health',
                'slug' => 'understanding-mental-health',
                'content' => 'This article provides insights into mental health issues and how to manage them.',
                'tumbnail' => 'path/to/thumbnail1.jpg',
                'status' => 'accepted',
                'psikolog_id' => 1, // Optional, or use null
                'admin_id' => null, // Optional, or use null
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'The Impact of Therapy',
                'slug' => 'the-impact-of-therapy',
                'content' => 'An exploration of how therapy can help individuals cope with psychological challenges.',
                'tumbnail' => 'path/to/thumbnail2.jpg',
                'status' => 'pending',
                'psikolog_id' => 1,
                'admin_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Insert into tag_artikel_mappings
        DB::table('tag_artikel_mappings')->insert([
            [
                'artikel_id' => 1,
                'tag_artikel_id' => 1,
            ],
            [
                'artikel_id' => 1,
                'tag_artikel_id' => 2,
            ],
            [
                'artikel_id' => 2,
                'tag_artikel_id' => 2,
            ],
        ]);

        // Insert into category_artikel_mappings
        DB::table('category_artikel_mappings')->insert([
            [
                'artikel_id' => 1,
                'kategori_artikel_id' => 1,
            ],
            [
                'artikel_id' => 1,
                'kategori_artikel_id' => 2,
            ],
            [
                'artikel_id' => 2,
                'kategori_artikel_id' => 2,
            ],
        ]);
    }
}