<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog', [
            'title' => 'Blog',
            'posts' => Blog::all()
        ]);
    }

    public function show($slug)
    {
        $post = Blog::find($slug);
        if (!$post) {
            abort(404);
        }
        return view('blog-details', [
            'title' => $post['title'],
            'post' => $post
        ]);
    }
}
