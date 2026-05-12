<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class BlogPostController extends Controller
{
    public function index(): View
    {
        $posts = BlogPost::with('category')->paginate(10);
        return view('admin.blog-posts.index', compact('posts'));
    }

    public function create(): View
    {
        $categories = BlogCategory::all();
        return view('admin.blog-posts.create', compact('categories'));
    }

    public function store(\Illuminate\Http\Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'excerpt'     => 'required|string|max:500',
            'content'     => 'required|string',
            'category_id' => 'required|exists:blog_categories,id',
            'author'      => 'nullable|string|max:100',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $slug = \Illuminate\Support\Str::slug($validated['title']);
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog', 'public');
        }

        BlogPost::create([
            'title'        => $validated['title'],
            'slug'         => $slug,
            'excerpt'      => $validated['excerpt'],
            'content'      => $validated['content'],
            'category_id'  => $validated['category_id'],
            'author'       => $validated['author'] ?? 'DÉMÉ',
            'image_path'   => $imagePath,
            'is_published' => $request->boolean('is_published', false),
            'published_at' => $validated['published_at'] ?? null,
        ]);

        return redirect()->route('admin.blog-posts.index')->with('success', 'Article créé.');
    }

    public function edit(BlogPost $blogPost): View
    {
        $categories = BlogCategory::all();
        return view('admin.blog-posts.edit', compact('blogPost', 'categories'));
    }

    public function update(\Illuminate\Http\Request $request, BlogPost $blogPost): RedirectResponse
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'excerpt'     => 'required|string|max:500',
            'content'     => 'required|string',
            'category_id' => 'required|exists:blog_categories,id',
            'author'      => 'nullable|string|max:100',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $slug = \Illuminate\Support\Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            if ($blogPost->image_path) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($blogPost->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('blog', 'public');
        }

        $validated['is_published'] = $request->boolean('is_published', false);
        $validated['slug'] = $slug;
        $validated['author'] = $validated['author'] ?? 'DÉMÉ';

        $blogPost->update($validated);

        return redirect()->route('admin.blog-posts.index')->with('success', 'Article mis à jour.');
    }

    public function destroy(BlogPost $blogPost): RedirectResponse
    {
        if ($blogPost->image_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($blogPost->image_path);
        }
        $blogPost->delete();

        return redirect()->route('admin.blog-posts.index')->with('success', 'Article supprimé.');
    }
}
