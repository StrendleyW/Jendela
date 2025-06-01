<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TopPicksController;



//dashboard
Route::get('/', [DashboardController::class, 'index']);


//category
Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('category.show');

//detail berita
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('berita.show'); //slug dari judul

//top picks
Route::get('/top-picks', [TopPicksController::class, 'show'])->name('top-picks.show');

//fact check
Route::view('/fact-checks', 'fact-checks', [
    'navCategories'     => collect(), // Mengirim $navCategories sebagai koleksi kosong
])->name('fact-checks.show');

//indeks
// Route::get('/indeks', [TopPicksContoller::class, 'show'])->name('indeks.show');