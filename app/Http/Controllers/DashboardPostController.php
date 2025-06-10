<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Validation\Rule;

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
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:blogs,slug',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Add the authenticated user's ID to the validated data
        $validatedData['user_id'] = Auth::id();
        $validatedData['excerpt'] = Str::limit(strip_tags($request->content), 200);
        // Create a new blog post
        Blog::create($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('dashboard.post.index')->with('success', 'Blog post created successfully.');
    }

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
    public function edit(Blog $blog)
    {

        // Check if the blog post belongs to the authenticated user
        if (Auth::user()->id !== $blog->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('dashboard.post.edit', [
            'post' => $blog,
            'categories' => \App\Models\Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Blog $blog)
    // {
    //     // Check if the blog post belongs to the authenticated user
    //     if (Auth::user()->id !== $blog->user_id) {
    //         abort(403, 'Unauthorized action.');
    //     }

    //     // Validate the request data
    //     $rules = [
    //         'title' => 'required|max:255',
    //         'content' => 'required',
    //         'category_id' => 'required|exists:categories,id',
    //     ];

    //     if ($request->slug !== $blog->slug) {
    //         $rules['slug'] = 'required|unique:blogs,slug';
    //     } else {
    //         $rules['slug'] = 'required';
    //     }

    //     $validatedData = $request->validate($rules);

    //     // Update the blog post with the validated data
    //     $validatedData['excerpt'] = Str::limit(strip_tags($request->content), 200);
    //     Blog::where('id', $blog->id)->update($validatedData);
    //     $blog->update($validatedData);

    //     // Redirect to the index page with a success message
    //     return redirect()->route('dashboard.post.index')->with('success', 'Blog post updated successfully.');
    // }
    public function update(Request $request, Blog $blog)
    {
        // Authorization - ensure user owns the blog post
        if (Auth::id() !== $blog->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Validate request data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'slug' => [
                'required',
                Rule::unique('blogs', 'slug')->ignore($blog->id)
            ]
        ]);

        // Generate excerpt
        $validatedData['excerpt'] = Str::limit(strip_tags($request->content), 200);

        // Update the blog post
        $blog->update($validatedData);

        // Redirect with success message
        return redirect()->route('dashboard.post.index')
            ->with('success', 'Blog post updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        // Check if the blog post belongs to the authenticated user
        if (Auth::user()->id !== $blog->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Delete the blog post
        $blog->delete();

        // Redirect to the index page with a success message
        return redirect()->route('dashboard.post.index')->with('success', 'Blog post deleted successfully.');
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
