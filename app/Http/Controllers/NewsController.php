<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;

class NewsController extends Controller
{
public function show($slug)
{
    $news = News::where('slug', $slug)->firstOrFail();
    return view('detail-berita', compact('news'));
}
}
