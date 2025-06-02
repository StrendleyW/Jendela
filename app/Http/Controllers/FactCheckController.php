<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FactCheckArticle; // Pastikan path model ini benar
use App\Models\Category;         // Pastikan path model ini benar

class FactCheckController extends Controller
{
    /**
     * Menampilkan daftar artikel cek fakta.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil artikel cek fakta, diurutkan berdasarkan terbaru, dengan pagination
        $factCheckArticles = FactCheckArticle::whereNotNull('published_at')
                                        ->latest('published_at')
                                        ->paginate(10); // 10 artikel per halaman

        // Ambil kategori untuk navigasi
        $navCategories = Category::orderBy('name', 'asc')->get(); // Contoh query

        // Kirim data ke view
        return view('fact-check', [ // Pastikan 'fact-check' adalah nama file view Anda yang benar
            'factCheckArticles' => $factCheckArticles,
            'navCategories'     => $navCategories,
        ]);
    }
    public function show($slug) // Parameter $slug akan diisi dari URL
    {
        $article = FactCheckArticle::where('slug', $slug)->whereNotNull('published_at')->firstOrFail();
        $navCategories = Category::orderBy('name', 'asc')->get();

        return view('fact-check-detail', [ // Anda perlu membuat view 'fact-check-detail.blade.php'
            'article' => $article,
            'navCategories' => $navCategories,
        ]);
    }
}