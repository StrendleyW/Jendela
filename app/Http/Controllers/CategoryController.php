<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News; 
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    public function show(Category $category)
    {
        // Ambil berita yang termasuk dalam kategori ini
        // Urutkan berdasarkan yang terbaru (published_at atau created_at)
        // Gunakan paginate() untuk pembagian halaman
        $newsList = News::where('category_id', $category->id)
                        ->where('published_at', '<=', now()) // Hanya tampilkan yang sudah dipublish
                        ->orderBy('published_at', 'desc')
                        ->paginate(10); // Ganti 10 dengan jumlah berita per halaman yang diinginkan

        // Ambil juga kategori untuk navigasi 
        $navCategories = Category::all();

        // Kirim data ke view
        return view('category', [
            'category' => $category,
            'newsList' => $newsList,
            'navCategories' => $navCategories,
        ]);
    }
}