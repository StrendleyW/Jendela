<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;
use App\Models\Category;
use Carbon\Carbon;       // Untuk waktu


class SearchController extends Controller
{
public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $now = Carbon::now();
        $newsList = News::with('category') 
                        ->where('published_at', '<=', $now) 
                        ->where(function ($query) use ($keyword) {
                            $query->where('title', 'LIKE', "%{$keyword}%")
                                  ->orWhere('content_news', 'LIKE', "%{$keyword}%");
                        })
                        ->orderBy('published_at', 'desc') // Urutkan dari yang terbaru
                        ->paginate(10)
                        ->withQueryString(); 

        $navCategories = Category::orderBy('display_order', 'asc')->orderBy('name', 'asc')->get();

        return view('search-results', [
            'newsList'      => $newsList,
            'keyword'       => $keyword,
            'navCategories' => $navCategories,
        ]);
    }
}