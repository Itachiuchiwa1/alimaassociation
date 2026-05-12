<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    public function index(): View
    {
        $categories = BlogCategory::withCount('posts')->paginate(10);
        return view('admin.blog-categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.blog-categories.create');
    }

    public function store(\Illuminate\Http\Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:blog_categories',
        ]);

        $slug = \Illuminate\Support\Str::slug($validated['name']);

        BlogCategory::create([
            'name' => $validated['name'],
            'slug' => $slug,
        ]);

        return redirect()->route('admin.blog-categories.index')->with('success', 'Catégorie créée.');
    }

    public function edit(BlogCategory $blogCategory): View
    {
        return view('admin.blog-categories.edit', compact('blogCategory'));
    }

    public function update(\Illuminate\Http\Request $request, BlogCategory $blogCategory): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:blog_categories,name,' . $blogCategory->id,
        ]);

        $slug = \Illuminate\Support\Str::slug($validated['name']);
        $blogCategory->update([
            'name' => $validated['name'],
            'slug' => $slug,
        ]);

        return redirect()->route('admin.blog-categories.index')->with('success', 'Catégorie mise à jour.');
    }

    public function destroy(BlogCategory $blogCategory): RedirectResponse
    {
        if ($blogCategory->posts()->count() > 0) {
            return redirect()->route('admin.blog-categories.index')
                ->with('error', 'Impossible de supprimer une catégorie avec des articles.');
        }

        $blogCategory->delete();
        return redirect()->route('admin.blog-categories.index')->with('success', 'Catégorie supprimée.');
    }
}
