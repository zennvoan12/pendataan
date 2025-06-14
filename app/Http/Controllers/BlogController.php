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
            'posts' => Blog::latest()
                ->filter(request(['search', 'category', 'author']))
                ->paginate(10)
                ->withQueryString(),
        ]);
    }

    public function show(Blog $blog)
    {
        $blog->load(['comments.user']);

        $recentPosts = Blog::where('published', true)
            ->where('id', '!=', $blog->id)
            ->latest()
            ->take(5)
            ->get();

        $categories = Category::withCount('posts')->orderBy('name')->get();

        return view('blog-details', [
            'title' => $blog['title'],
            'post' => $blog,
            'recentPosts' => $recentPosts,
            'categories' => $categories,

        ]);
    }

    public function search(Request $request)
    {

        return view('blog', [
            'title' => 'Search Results',
            'posts' => Blog::latest()
                ->filter(request(['search', 'category', 'author']))
                ->paginate(10)
                ->withQueryString()
        ]);
    }
}
