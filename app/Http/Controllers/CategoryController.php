<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('categories', [
            'title' => 'Blog Categories',
            'categories' => Category::withCount('posts')->get()

        ]);
    }
}
