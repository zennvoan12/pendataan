<?php


use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('guest');
// Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('guest');
// Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
// Route::get('/register', [LoginController::class, 'create'])->name('register.create')->middleware('guest');
// Route::post('/register', [LoginController::class, 'store'])->name('register.store');
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Menyederhanakan rute dengan menggunakan Resource Controller
Route::resource('login', LoginController::class)->middleware('guest')
    ->only(['index', 'store', 'authenticate', 'create']);
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
