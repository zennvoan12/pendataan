<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller; // Import the correct Controller base class

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $user = Auth::user();

        // Pastikan user terautentikasi
        if (!$user) {
            return redirect()->route('login');
        }

        $posts = Blog::where('user_id', $user->id)
            ->with('category') // Eager load category
            ->latest()
            ->take(5)
            ->get();

        // Perbaikan query untuk menghitung jumlah postingan per kategori
        $categories = Category::withCount(['posts as posts_count' => function ($query) use ($user) {
            $query->where('user_id', $user->id);
        }])
            ->orderByDesc('posts_count')
            ->take(5)
            ->get();

        $stats = [
            'total_posts' => Blog::where('user_id', $user->id)->count(),
            'published_posts' => Blog::where('user_id', $user->id)
                ->where('published', true)
                ->count(),
            'draft_posts' => Blog::where('user_id', $user->id)
                ->where('published', false)
                ->count(),
            'total_categories' => Category::count(),
            'most_popular_post' => Blog::where('user_id', $user->id)
                ->orderByDesc('views')
                ->first(),
            'total_views' => Blog::where('user_id', $user->id)->sum('views'),
        ];

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'posts' => $posts,
            'categories' => $categories,
            'stats' => $stats,
            'breadcrumbs' => [
                ['name' => 'Dashboard', 'url' => route('dashboard')]
            ]
        ]);
    }


    public function logout(Request $request)
    {
        // Log out the user
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        // Redirect to the home page with a success message
        return redirect('/')->with('success', 'You have been logged out successfully.');
    }
}
