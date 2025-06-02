<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class DashboardController extends Controller
{
        public function index()
    {
    $latestNews = News::latest()->take(5)->get();
    $topPicks = News::where('is_top_pick', true)->latest('published_at')->take(4)->get();
    $navCategories = Category::orderBy('name', 'asc')->get();

    return view('main-dashboard', compact('latestNews', 'topPicks', 'navCategories'));
    }
}
