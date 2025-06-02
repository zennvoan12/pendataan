<?php

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Models\User;

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


Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Blog Categories',
        'categories' => Category::all()
    ]);
});


Route::get('/categories/{category:slug}', function (Category $category) {
    return view('category', [
        'title' => $category->name,
        'posts' => $category->posts,
        'category' => $category->name,
        'categories' => Category::all()
    ]);
});


Route::get('/authors/{author:username}', function (User $author) {
    return view('blog', [
        'title' => "Posts by {$author->name}",
        'posts' => $author->blogs,
        // 'categories' => Category::all()
    ]);
});
