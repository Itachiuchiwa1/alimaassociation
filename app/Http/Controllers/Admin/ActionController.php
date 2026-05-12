<?php

namespace App\Http\Controllers\Admin;

use App\Models\Action;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class ActionController extends Controller
{
    public function index(): View
    {
        $actions = Action::orderBy('order')->paginate(10);
        return view('admin.actions.index', compact('actions'));
    }

    public function create(): View
    {
        return view('admin.actions.create');
    }

    public function store(\Illuminate\Http\Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'icon'        => 'required|in:megaphone,book,graduation,heart,users,shield',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order'       => 'nullable|integer',
            'is_active'   => 'boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('actions', 'public');
        }

        Action::create([
            'title'       => $validated['title'],
            'description' => $validated['description'],
            'icon'        => $validated['icon'],
            'image_path'  => $imagePath,
            'order'       => $validated['order'] ?? 0,
            'is_active'   => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.actions.index')->with('success', 'Action créée avec succès.');
    }

    public function edit(Action $action): View
    {
        return view('admin.actions.edit', compact('action'));
    }

    public function update(\Illuminate\Http\Request $request, Action $action): RedirectResponse
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'icon'        => 'required|in:megaphone,book,graduation,heart,users,shield',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order'       => 'nullable|integer',
            'is_active'   => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($action->image_path) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($action->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('actions', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', true);
        $action->update($validated);

        return redirect()->route('admin.actions.index')->with('success', 'Action mise à jour.');
    }

    public function destroy(Action $action): RedirectResponse
    {
        if ($action->image_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($action->image_path);
        }
        $action->delete();

        return redirect()->route('admin.actions.index')->with('success', 'Action supprimée.');
    }
}
