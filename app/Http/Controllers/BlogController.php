<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog', [
            'title' => ' All Blogs',
            // 'posts' => Blog::all()
            'posts' => Blog::latest()->get()
        ]);
    }

    public function show(Blog $blog)
    {

        return view('blog-details', [
            'title' => $blog['title'],
            'post' => $blog
        ]);
    }
}
