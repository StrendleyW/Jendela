<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;
use App\Models\Category;
use Carbon\Carbon;       // Untuk waktu

class NewsController extends Controller
{
public function show($slug)
{
    $news = News::with('category')->where('slug', $slug)->where('published_at', '<=', now())->firstOrFail();
    $latestNews = News::latest()->take(5)->get();
    $topPicks = News::where('is_top_pick', true)->latest('published_at')->take(5)->get();
    $navCategories = Category::orderBy('name', 'asc')->get();
    return view('detail-berita', compact('news', 'navCategories', 'latestNews', 'topPicks'));
}
}
