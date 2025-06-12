<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller; // Ensure correct Controller is imported
class CategoryController extends Controller
{
    // Resource methods expected by Route::resource
    public function index()
    {
        return $this->categoriesIndex();
    }

    public function create()
    {
        return $this->categoryCreate();
    }

    public function store(Request $request)
    {
        return $this->categoryStore($request);
    }

    public function edit(Category $category)
    {
        return $this->categoryEdit($category);
    }

    public function update(Request $request, Category $category)
    {
        return $this->categoryUpdate($request, $category);
    }

    public function destroy(Category $category)
    {
        return $this->categoryDestroy($category);
    }
    // Manajemen Kategori
    public function categoriesIndex()
    {
        return view('dashboard.admin.categories.index', [
            'categories' => Category::latest()->paginate(10),
            'title' => 'Manage Categories'
        ]);
    }

    public function categoryCreate()
    {
        return view('dashboard.admin.categories.create');
    }

    public function categoryStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'description' => 'nullable|max:255'
        ]);

        $validatedData['slug'] = Str::slug($request->name);

        Category::create($validatedData);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully');
    }

    public function categoryEdit(Category $category)
    {
        return view('dashboard.admin.categories.edit', compact('category'));
    }

    public function categoryUpdate(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|max:255'
        ]);

        $validatedData['slug'] = Str::slug($request->name);

        $category->update($validatedData);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully');
    }

    public function categoryDestroy(Category $category)
    {
        // Cek apakah kategori digunakan oleh postingan
        if ($category->blogs()->exists()) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Cannot delete category with associated posts');
        }

        $category->delete();
        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
