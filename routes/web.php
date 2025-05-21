<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DashboardController;


//dashboard
Route::get('/home', [DashboardController::class, 'index']);

//detail berita
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('berita.show'); //slug dari judul

// Tes local
// Route::get('/news/{slug}', function ($slug) {
    // Contoh data dummy (nanti bisa diganti dari database)
    // $berita = [
    //     'bbm-naik-lagi' => [
    //         'judul' => 'BBM Naik Lagi',
    //         'isi' => 'Pemerintah kembali menaikkan harga BBM...',
    //         'gambar' => 'images/bbm.png',
    //         'script' => 'js/script/dateTime.js'
    //     ],
    // ];

     // Validasi slug
//     if (!array_key_exists($slug, $berita)) {
//         abort(404); // Tampilkan halaman 404 jika slug tidak ditemukan
//     }
//     $berita = $berita[$slug];
//     return view('detail-berita', compact('berita'));
// });

// Route::get('/admin-dashboard', function () {
//     return view('admin-dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/login', function () {
//     return redirect('/admin-login');
// })->name('login');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



// require __DIR__.'/auth.php';
