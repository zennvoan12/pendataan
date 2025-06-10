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

// Menyederhanakan rute dengan menggunakan Resource Controller
Route::resource('login', LoginController::class)->middleware('guest')
    ->only(['index', 'store', 'authenticate', 'create']);
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::resource('dashboard/blog', DashboardPostController::class);
// });


// Route::resource('/dashboard/blog', DashboardPostController::class)->parameters(['blog' => 'blog:slug'])
//     ->middleware('auth');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard/blog/checkSlug', [DashboardPostController::class, 'checkSlug']);
//     // Your other dashboard routes...
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [DashboardController::class, 'logout'])->name('dashboard.logout');
    Route::get('/dashboard/blog/checkSlug', [DashboardPostController::class, 'checkSlug'])->name('dashboard.post.checkSlug');
    Route::resource('dashboard/blog', DashboardPostController::class)
        ->parameters(['blog' => 'blog:slug'])
        ->names([
            'index' => 'dashboard.post.index',
            'create' => 'dashboard.post.create',
            'store' => 'dashboard.post.store',
            'show' => 'dashboard.post.show',
            'edit' => 'dashboard.post.edit',
            'update' => 'dashboard.post.update',
            'destroy' => 'dashboard.post.destroy',

        ]);
    // Dashboard blog routes with proper naming
    // Route::prefix('dashboard')->name('dashboard.')->group(function () {
    //     Route::get('/blog', [DashboardPostController::class, 'index'])->name('post.index');
    //     Route::get('/blog/create', [DashboardPostController::class, 'create'])->name('create');
    //     Route::post('/blog', [DashboardPostController::class, 'store'])->name('post.store');
    //     Route::get('/blog/{blog}', [DashboardPostController::class, 'show'])->name('post.show');
    //     Route::get('/blog/{blog}/edit', [DashboardPostController::class, 'edit'])->name('post.edit');
    //     Route::put('/blog/{blog}', [DashboardPostController::class, 'update'])->name('post.update');
    //     Route::delete('/blog/{blog}', [DashboardPostController::class, 'destroy'])->name('post.destroy');

    //     // AJAX route for slug checking
    //     Route::get('/blog/checkSlug', [DashboardPostController::class, 'checkSlug'])->name('post.checkSlug');
    // });
});
