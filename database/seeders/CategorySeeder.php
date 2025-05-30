<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Str; 

class CategorySeeder extends Seeder
{
    /**
     * Buat memmasukkan category ke database secara manual.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Economy',
                'slug' => Str::slug('Economy'), 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Entertainment',
                'slug' => Str::slug('Entertainment'), 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fashion',
                'slug' => Str::slug('Fashion'), 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Food',
                'slug' => Str::slug('Food'), 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Politic',
                'slug' => Str::slug('Politic'), 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sport',
                'slug' => Str::slug('Sport'), 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Technology',
                'slug' => Str::slug('Technology'), 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan kategori lain jika perlu
        ]);
    }
}