<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class IndeksController extends Controller
{
    public function index(Request $request)
    {
        // Ambil input filter dari URL, jika ada
        $selectedCategorySlug = $request->input('category');
        $selectedDate = $request->input('date');

        // Mulai query berita yang sudah publish
        $query = News::with('category')
                     ->where('published_at', '<=', now())
                     ->latest('published_at');

        // Terapkan filter KATEGORI jika dipilih
        if ($selectedCategorySlug) {
            $query->whereHas('category', function ($q) use ($selectedCategorySlug) {
                $q->where('slug', $selectedCategorySlug);
            });
        }

        // Terapkan filter TANGGAL jika dipilih
        if ($selectedDate) {
            $query->whereDate('published_at', $selectedDate);
        }

        // Eksekusi query dengan paginasi
        $newsList = $query->paginate(15)->withQueryString();

        // Ambil semua kategori untuk dropdown filter & navigasi
        $allCategories = Category::orderBy('name', 'asc')->get();
        $navCategories = $allCategories;

        // Kirim semua data yang dibutuhkan ke view
        return view('indeks', [
            'newsList'              => $newsList,
            'navCategories'         => $navCategories,
            'allCategories'         => $allCategories,
            'selectedCategorySlug'  => $selectedCategorySlug,
            'selectedDate'          => $selectedDate,
            'category'              => null,
        ]);
    }
}