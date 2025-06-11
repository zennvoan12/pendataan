<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {

        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = " Posted in {$category->name}";
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = "Posts by {$author->name}";
        }


        return view('blog', [
            'title' => $title,
            // 'posts' => Blog::all()
            'posts' => Blog::latest()->paginate(10)->withQueryString(),
        ]);
    }

    public function show(Blog $blog)
    {

        return view('blog-details', [
            'title' => $blog['title'],
            'post' => $blog
        ]);
    }

    public function search(Request $request)
    {

        return view('blog', [
            'title' => 'Search Results',
            'posts' => Blog::latest()->filter(request(['search', 'category', 'author']))->get()
        ]);
    }
}
