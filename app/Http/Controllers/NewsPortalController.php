<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsPortalController extends Controller
{
    public function index(){
        $news = News::latest()->paginate(10);

        return view('dashboard', compact('news'));
    }
}
