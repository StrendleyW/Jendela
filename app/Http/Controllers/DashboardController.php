<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class DashboardController extends Controller
{
        public function index()
    {
    $latestNews = News::latest()->take(4)->get();
    $topPicks = News::where('is_top_pick', true)->latest('published_at')->take(4)->get();

    return view('main-dashboard', compact('latestNews', 'topPicks'));
    }
}
