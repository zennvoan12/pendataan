<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $popularPosts = Blog::where('published', true)
            ->orderByDesc('views')
            ->take(3)
            ->get();

        return view('index', [
            'title' => 'Home',
            'popularPosts' => $popularPosts,
        ]);
    }
}
