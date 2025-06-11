<?php


use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;

Route::get("/", function () {
    return view(
        "index",
        [
            "title" => "Home"
        ]
    );
});

Route::get("/about", [AboutController::class, 'index'])->name('about.index');


Route::resource('/blog', BlogController::class)->parameters(['blog' => 'blog:slug']);
Route::get('/search', [BlogController::class, 'search'])->name('blog.search');

Route::resource('/categories', CategoryController::class)->parameters(['categories' => 'category:slug']);

// Rute untuk guest (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
});

// Rute yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Rute tambahan untuk cek slug
    Route::get('/dashboard/blog/checkSlug', [DashboardPostController::class, 'checkSlug'])
        ->name('dashboard.post.checkSlug');
    // Rute resource blog dengan konfigurasi khusus
    Route::resource('dashboard/blog', DashboardPostController::class)
        ->parameters(['blog' => 'blog:slug'])
        ->names('dashboard.post');

});
