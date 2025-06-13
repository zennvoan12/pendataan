<?php


use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController as AdminCategory;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AccountController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get("/about", [AboutController::class, 'index'])->name('about.index');


Route::resource('/blog', BlogController::class)->parameters(['blog' => 'blog:slug']);
Route::post('/blog/{blog:slug}/comments', [CommentController::class, 'store'])
    ->name('comments.store')->middleware('auth');
Route::get('/search', [BlogController::class, 'search'])->name('blog.search');

Route::resource('/categories', CategoryController::class)->parameters(['categories' => 'category:slug']);

// Rute untuk guest (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
});
// Rute untuk admin
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


    // Rute untuk cek slug
    Route::get('/dashboard/blog/checkSlug', [DashboardPostController::class, 'checkSlug'])
        ->name('dashboard.post.checkSlug');
    // Rute resource blog dengan parameter slug khusus
    Route::resource('dashboard/blog', DashboardPostController::class)
        ->parameters(['blog' => 'blog:slug'])
        ->names('dashboard.post');

    // Profile routes
    Route::get('/account', [AccountController::class, 'show'])->name('account.show');
    Route::get('/account/edit', [AccountController::class, 'edit'])->name('account.edit');
    Route::put('/account', [AccountController::class, 'update'])->name('account.update');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Manajemen User
    Route::resource('users', UserController::class)
        ->only(['index', 'edit', 'update', 'destroy']);

    // Manajemen Kategori
    Route::resource('categories', AdminCategory::class)
        ->except(['show']);
});
