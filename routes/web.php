<?php


use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
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
// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//     Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//     // Rute tambahan untuk cek slug
//     Route::get('/dashboard/blog/checkSlug', [DashboardPostController::class, 'checkSlug'])
//         ->name('dashboard.post.checkSlug');
//     // Rute resource blog dengan konfigurasi khusus
//     Route::resource('dashboard/blog', DashboardPostController::class)
//         ->parameters(['blog' => 'blog:slug'])
//         ->names('dashboard.post');
// });
// Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
//     // User management
//     Route::get('/users', [AdminController::class, 'usersIndex'])->name('users.index');
//     Route::get('/users/{user}/edit', [AdminController::class, 'userEdit'])->name('users.edit');
//     Route::put('/users/{user}', [AdminController::class, 'userUpdate'])->name('users.update');
//     Route::delete('/users/{user}', [AdminController::class, 'userDestroy'])->name('users.destroy');

//     // Category management
//     Route::get('/categories', [AdminController::class, 'categoriesIndex'])->name('categories.index');
//     Route::get('/categories/create', [AdminController::class, 'categoryCreate'])->name('categories.create');
//     Route::post('/categories', [AdminController::class, 'categoryStore'])->name('categories.store');
//     Route::get('/categories/{category}/edit', [AdminController::class, 'categoryEdit'])->name('categories.edit');
//     Route::put('/categories/{category}', [AdminController::class, 'categoryUpdate'])->name('categories.update');
//     Route::delete('/categories/{category}', [AdminController::class, 'categoryDestroy'])->name('categories.destroy');
// });
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
});

// Rute admin dengan middleware admin
// Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
//     // Manajemen User
//     Route::get('/users', [AdminController::class, 'usersIndex'])->name('users.index');
//     Route::get('/users/{user}/edit', [AdminController::class, 'userEdit'])->name('users.edit');
//     Route::put('/users/{user}', [AdminController::class, 'userUpdate'])->name('users.update');
//     Route::delete('/users/{user}', [AdminController::class, 'userDestroy'])->name('users.destroy');

//     // Manajemen Kategori
//     Route::get('/categories', [AdminController::class, 'categoriesIndex'])->name('categories.index');
//     Route::get('/categories/create', [AdminController::class, 'categoryCreate'])->name('categories.create');
//     Route::post('/categories', [AdminController::class, 'categoryStore'])->name('categories.store');
//     Route::get('/categories/{category}/edit', [AdminController::class, 'categoryEdit'])->name('categories.edit');
//     Route::put('/categories/{category}', [AdminController::class, 'categoryUpdate'])->name('categories.update');
//     Route::delete('/categories/{category}', [AdminController::class, 'categoryDestroy'])->name('categories.destroy');
// });
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Manajemen User
    Route::resource('users', UserController::class)
        ->only(['index', 'edit', 'update', 'destroy']);

    // Manajemen Kategori
    Route::resource('categories', CategoryController::class)
        ->except(['show']);
});
