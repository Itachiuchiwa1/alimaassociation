<?php

namespace App\Http\Controllers\Admin;

use App\Models\GalleryImage;
use App\Models\GalleryCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class GalleryImageController extends Controller
{
    public function index(): View
    {
        $images = GalleryImage::with('category')->paginate(12);
        return view('admin.gallery-images.index', compact('images'));
    }

    public function create(): View
    {
        $categories = GalleryCategory::all();
        return view('admin.gallery-images.create', compact('categories'));
    }

    public function store(\Illuminate\Http\Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:gallery_categories,id',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order'       => 'nullable|integer',
            'is_active'   => 'boolean',
        ]);

        $imagePath = $request->file('image')->store('gallery', 'public');

        GalleryImage::create([
            'title'       => $validated['title'],
            'category_id' => $validated['category_id'],
            'image_path'  => $imagePath,
            'order'       => $validated['order'] ?? 0,
            'is_active'   => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.gallery-images.index')->with('success', 'Image ajoutée.');
    }

    public function edit(GalleryImage $galleryImage): View
    {
        $categories = GalleryCategory::all();
        return view('admin.gallery-images.edit', compact('galleryImage', 'categories'));
    }

    public function update(\Illuminate\Http\Request $request, GalleryImage $galleryImage): RedirectResponse
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:gallery_categories,id',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order'       => 'nullable|integer',
            'is_active'   => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($galleryImage->image_path);
            $validated['image_path'] = $request->file('image')->store('gallery', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', true);
        $galleryImage->update($validated);

        return redirect()->route('admin.gallery-images.index')->with('success', 'Image mise à jour.');
    }

    public function destroy(GalleryImage $galleryImage): RedirectResponse
    {
        \Illuminate\Support\Facades\Storage::disk('public')->delete($galleryImage->image_path);
        $galleryImage->delete();

        return redirect()->route('admin.gallery-images.index')->with('success', 'Image supprimée.');
    }
}
