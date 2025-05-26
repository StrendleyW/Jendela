<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class CategoryController extends Controller {

public function show($slug)
{
    $category = Category::where('slug', $slug)->firstOrFail();

    $newsList = $category->news()->latest()->paginate(6); // pastikan relasi news() dibuat di model Category

    return view('category', compact('category', 'newsList'));
}}
