<?php


use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;

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

Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [LoginController::class, 'create'])->name('register.create');


// Route::get('/authors/{author:username}', function (User $author) {
//     return view('blog', [
//         'title' => "Posts by {$author->name}",
//         'posts' => $author->blogs->load(['author', 'category']),
//         // 'categories' => Category::all()
//     ]);
// });
