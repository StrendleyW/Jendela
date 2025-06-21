<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News; 
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    public function show(Category $category)
    {

        $newsList = News::where('category_id', $category->id)
                        ->where('published_at', '<=', now()) // Hanya tampilkan yang sudah dipublish
                        ->orderBy('published_at', 'desc')
                        ->paginate(10); 

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