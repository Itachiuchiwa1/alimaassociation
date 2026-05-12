<?php

namespace App\Http\Controllers\Admin;

use App\Models\GalleryCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class GalleryCategoryController extends Controller
{
    public function index(): View
    {
        $categories = GalleryCategory::withCount('images')->paginate(10);
        return view('admin.gallery-categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.gallery-categories.create');
    }

    public function store(\Illuminate\Http\Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:gallery_categories',
        ]);

        $slug = \Illuminate\Support\Str::slug($validated['name']);

        GalleryCategory::create([
            'name' => $validated['name'],
            'slug' => $slug,
        ]);

        return redirect()->route('admin.gallery-categories.index')->with('success', 'Catégorie créée.');
    }

    public function edit(GalleryCategory $galleryCategory): View
    {
        return view('admin.gallery-categories.edit', compact('galleryCategory'));
    }

    public function update(\Illuminate\Http\Request $request, GalleryCategory $galleryCategory): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:gallery_categories,name,' . $galleryCategory->id,
        ]);

        $slug = \Illuminate\Support\Str::slug($validated['name']);
        $galleryCategory->update([
            'name' => $validated['name'],
            'slug' => $slug,
        ]);

        return redirect()->route('admin.gallery-categories.index')->with('success', 'Catégorie mise à jour.');
    }

    public function destroy(GalleryCategory $galleryCategory): RedirectResponse
    {
        if ($galleryCategory->images()->count() > 0) {
            return redirect()->route('admin.gallery-categories.index')
                ->with('error', 'Impossible de supprimer une catégorie avec des images.');
        }

        $galleryCategory->delete();
        return redirect()->route('admin.gallery-categories.index')->with('success', 'Catégorie supprimée.');
    }
}
