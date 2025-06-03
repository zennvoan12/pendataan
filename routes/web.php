<?php

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
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


Route::resource('/categories', CategoryController::class)->parameters(['categories' => 'category:slug']);





Route::get('/authors/{author:username}', function (User $author) {
    return view('blog', [
        'title' => "Posts by {$author->name}",
        'posts' => $author->blogs->load(['author', 'category']),
        // 'categories' => Category::all()
    ]);
});
