<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TopPicksController;
use App\Http\Controllers\FactCheckController;


//dashboard
Route::get('/', [DashboardController::class, 'index']);


//category
Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('category.show');

//detail berita
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('berita.show'); //slug dari judul

//top picks
Route::get('/top-picks', [TopPicksController::class, 'show'])->name('top-picks.show');

//fact check
// Untuk menampilkan daftar semua artikel
Route::get('/fact-checks', [FactCheckController::class, 'index'])->name('fact-checks.index');

// Untuk menampilkan SATU artikel spesifik berdasarkan slug-nya
Route::get('/fact-checks/{slug}', [FactCheckController::class, 'show'])->name('fact-checks.show');
// Route::view('/fact-checks', 'fact-checks', [
//     'navCategories'     => collect(), // Mengirim $navCategories sebagai koleksi kosong
// ])->name('fact-checks.show');