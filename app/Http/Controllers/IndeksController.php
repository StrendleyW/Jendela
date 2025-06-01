<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class IndeksController extends Controller
{
    public function show(Category $category)
    {
        $newsList = News::
                        where('published_at', '<=', now()) // Hanya tampilkan yang sudah dipublish
                        ->orderBy('published_at', 'desc')
                        ->paginate(10); // Ganti 10 dengan jumlah berita per halaman yang diinginkan

        // Ambil juga kategori untuk navigasi 
        $navCategories = Category::all();

        // Kirim data ke view
        return view('indeks', [
            'category' => $category,
            'newsList' => $newsList,
            'navCategories' => $navCategories,
        ]);
}
}
