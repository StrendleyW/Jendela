<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        News::create([
        'title' => 'Harga BBM Naik, Pemerintah Angkat Bicara',
        'slug' => Str::slug('Harga BBM Naik, Pemerintah Angkat Bicara'),
        'writer' => 'Naufal Rafy',
        'content_news' => 'Isi berita tentang kenaikan BBM testtesttesttesttes123231ttesttesttestsddsadsadasdasdsadasdsadsadsdsadsadasdsadasdasdadsadsa
        lalu wkwkwkwkkw kemudian saya mempunyai ini',
        'image' => 'images/bbm.png',
        'published_at' => now(),
        ]);


        // Tambahkan berita lainnya jika mau
    }
}