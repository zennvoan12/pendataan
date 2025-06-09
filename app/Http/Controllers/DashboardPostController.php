<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        return view('dashboard.post.index', [
            'posts' => Blog::where('user_id', $request->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.post.create', [
            'post' => new Blog(),
            'categories' => \App\Models\Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        // Check if the blog post belongs to the authenticated user
        if (Auth::user()->id !== $blog->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('dashboard.post.show', [
            'post' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }



    public function checkSlug(Request $request)
    {
        // Ensure there's a title
        if (!$request->has('title')) {
            return response()->json(['error' => 'Title is required'], 400);
        }

        // Generate the slug using the title provided in the request
        $slug = SlugService::createSlug(Blog::class, 'slug', $request->title);

        // Return the generated slug as JSON
        return response()->json(['slug' => $slug]);
    }
}
