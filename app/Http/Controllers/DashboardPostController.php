<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
// use Clockwork\Storage\Storage;
use Illuminate\Support\Facades\Storage;
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

    public function create()
    {
        return view('dashboard.post.create', [
            'post' => new Blog(),
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:blogs,slug',
            'image' => 'nullable|image|file|max:2048',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Handle image upload
        $validatedData['image'] = $this->handleImageUpload($request);

        // Add additional attributes
        $validatedData['user_id'] = Auth::id();
        $validatedData['excerpt'] = Str::limit(strip_tags($request->content), 200);

        // Create new blog post
        Blog::create($validatedData);

        return redirect()->route('dashboard.post.index')
            ->with('success', 'Blog post created successfully.');
    }

    public function show(Blog $blog)
    {
        $this->authorizeView($blog);
        return view('dashboard.post.show', [
            'post' => $blog
        ]);
    }

    public function edit(Blog $blog)
    {
        $this->authorizeView($blog);
        return view('dashboard.post.edit', [
            'post' => $blog,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Blog $blog)
    {
        $this->authorizeView($blog);

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|file|max:2048',
            'category_id' => 'required|exists:categories,id',
            'slug' => [
                'required',
                Rule::unique('blogs', 'slug')->ignore($blog->id)
            ]
        ]);

        // Handle image upload - include oldImage from form
        $validatedData['image'] = $this->handleImageUpload($request);

        // Generate excerpt
        $validatedData['excerpt'] = Str::limit(strip_tags($request->content), 200);

        // Update the blog post
        $blog->update($validatedData);

        return redirect()->route('dashboard.post.index')
            ->with('success', 'Blog post updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $this->authorizeView($blog);



        $blog->delete();

        return redirect()->route('dashboard.post.index')
            ->with('success', 'Blog post deleted successfully.');
    }

    public function checkSlug(Request $request)
    {
        if (!$request->has('title')) {
            return response()->json(['error' => 'Title is required'], 400);
        }

        $slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    // Private helper methods
    private function handleImageUpload(Request $request)
    {
        if ($request->hasFile('image')) {
            $newImage = $request->file('image')->store('post-images');

            // Delete old image if it exists
            if ($request->filled('oldImage')) {
                Storage::delete($request->oldImage);
            }

            return $newImage;
        }

        // Return old image if exists, otherwise null
        return $request->oldImage ?? null;
    }

    private function authorizeView(Blog $blog)
    {
        if (Auth::id() !== $blog->user_id) {
            abort(403, 'Unauthorized action.');
        }
    }
}
