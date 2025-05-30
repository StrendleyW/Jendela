<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TopPicksContoller;



//dashboard
Route::get('/', [DashboardController::class, 'index']);


//category
Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('category.show');

//detail berita
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('berita.show'); //slug dari judul

//top picks
Route::get('/top-picks', [TopPicksContoller::class, 'show'])->name('top-picks.show');