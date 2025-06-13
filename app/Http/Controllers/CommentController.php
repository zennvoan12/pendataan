<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'content' => 'required'
        ]);

        $validated['user_id'] = $request->user()->id;
        $validated['blog_id'] = $blog->id;

        Comment::create($validated);

        return back()->with('success', 'Comment posted!');
    }
}
