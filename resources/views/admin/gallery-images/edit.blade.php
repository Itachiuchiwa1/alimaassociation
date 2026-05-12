@extends('admin.layouts.app')
@section('title', 'Éditer une image')

@section('content')
<div class="max-w-2xl mx-auto">
  <h1 class="text-3xl font-bold mb-6">Éditer l'image</h1>

  <form action="{{ route('admin.gallery-images.update', $galleryImage) }}" method="POST" enctype="multipart/form-data"
        class="space-y-5 bg-white p-6 rounded-lg border border-gray-200">
    @csrf
    @method('PUT')

    <div>
      <label class="block text-sm font-semibold mb-2">Titre *</label>
      <input type="text" name="title" value="{{ old('title', $galleryImage->title) }}"
             class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent @error('title') border-red-500 @enderror"
             required>
      @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="block text-sm font-semibold mb-2">Catégorie *</label>
      <select name="category_id"
              class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent"
              required>
        <option value="">Choisir une catégorie</option>
        @foreach($categories as $cat)
          <option value="{{ $cat->id }}" {{ old('category_id', $galleryImage->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
        @endforeach
      </select>
      @error('category_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="block text-sm font-semibold mb-2">Image</label>
      <div class="mb-3">
        <p class="text-sm text-gray-600 mb-2">Image actuelle :</p>
        <img src="{{ asset($galleryImage->image_path) }}" alt="{{ $galleryImage->title }}" class="h-32 rounded-lg border border-gray-200">
      </div>
      <input type="file" name="image" accept="image/*"
             class="w-full px-4 py-2.5 border border-gray-300 rounded-lg @error('image') border-red-500 @enderror">
      <p class="text-xs text-gray-500 mt-1">PNG, JPG, GIF — Max 2 MB</p>
      @error('image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="block text-sm font-semibold mb-2">Ordre d'affichage</label>
      <input type="number" name="order" value="{{ old('order', $galleryImage->order) }}"
             class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent">
    </div>

    <div>
      <label class="flex items-center gap-2">
        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $galleryImage->is_active) ? 'checked' : '' }}>
        <span class="text-sm font-semibold">Actif</span>
      </label>
    </div>

    <div class="flex gap-3 pt-4 border-t border-gray-200">
      <button type="submit" class="px-6 py-2.5 bg-[var(--color-primary)] text-white rounded-lg hover:opacity-90 transition">
        Mettre à jour
      </button>
      <a href="{{ route('admin.gallery-images.index') }}"
         class="px-6 py-2.5 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
        Annuler
      </a>
    </div>
  </form>
</div>
@endsection
