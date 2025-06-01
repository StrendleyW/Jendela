<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;


class TopPicksController extends Controller
{
    public function show(Category $category)
    {
        // Ambil berita yang termasuk dalam kategori ini
        // Urutkan berdasarkan yang terbaru (published_at atau created_at)
        // Gunakan paginate() untuk pembagian halaman
        $newsList = News::where('is_top_pick', 1) 
                        ->where('published_at', '<=', now()) // Hanya tampilkan yang sudah dipublish
                        ->orderBy('published_at', 'desc')
                        ->paginate(10); // Ganti 10 dengan jumlah berita per halaman yang diinginkan

        // Ambil juga kategori untuk navigasi 
        $navCategories = Category::all();

        // Kirim data ke view
        return view('top-picks', [
            'category' => $category,
            'newsList' => $newsList,
            'navCategories' => $navCategories,
        ]);
}
}