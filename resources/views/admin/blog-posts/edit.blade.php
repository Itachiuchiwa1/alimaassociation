@extends('admin.layouts.app')
@section('title', 'Éditer un article')

@section('content')
<div class="max-w-4xl mx-auto">
  <h1 class="text-3xl font-bold mb-6">Éditer l'article</h1>

  <form action="{{ route('admin.blog-posts.update', $blogPost) }}" method="POST" enctype="multipart/form-data"
        class="space-y-5 bg-white p-6 rounded-lg border border-gray-200">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="block text-sm font-semibold mb-2">Titre *</label>
        <input type="text" name="title" value="{{ old('title', $blogPost->title) }}"
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
            <option value="{{ $cat->id }}" {{ old('category_id', $blogPost->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
          @endforeach
        </select>
        @error('category_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
      </div>
    </div>

    <div>
      <label class="block text-sm font-semibold mb-2">Résumé *</label>
      <textarea name="excerpt" rows="2" maxlength="500"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent @error('excerpt') border-red-500 @enderror"
                required>{{ old('excerpt', $blogPost->excerpt) }}</textarea>
      @error('excerpt') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="block text-sm font-semibold mb-2">Contenu *</label>
      <textarea name="content" rows="8"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent font-mono text-sm @error('content') border-red-500 @enderror"
                required>{{ old('content', $blogPost->content) }}</textarea>
      @error('content') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="block text-sm font-semibold mb-2">Auteur</label>
        <input type="text" name="author" value="{{ old('author', $blogPost->author) }}"
               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent">
      </div>

      <div>
        <label class="block text-sm font-semibold mb-2">Image</label>
        @if($blogPost->image_path)
          <div class="mb-3">
            <p class="text-sm text-gray-600 mb-2">Image actuelle :</p>
            <img src="{{ asset($blogPost->image_path) }}" alt="{{ $blogPost->title }}" class="h-16 rounded-lg border border-gray-200">
          </div>
        @endif
        <input type="file" name="image" accept="image/*"
               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg @error('image') border-red-500 @enderror">
        @error('image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
      </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="block text-sm font-semibold mb-2">Date de publication</label>
        <input type="date" name="published_at" value="{{ old('published_at', $blogPost->published_at?->format('Y-m-d')) }}"
               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent">
      </div>

      <div class="flex items-end">
        <label class="flex items-center gap-2">
          <input type="checkbox" name="is_published" value="1" {{ old('is_published', $blogPost->is_published) ? 'checked' : '' }}>
          <span class="text-sm font-semibold">Publié</span>
        </label>
      </div>
    </div>

    <div class="flex gap-3 pt-4 border-t border-gray-200">
      <button type="submit" class="px-6 py-2.5 bg-[var(--color-primary)] text-white rounded-lg hover:opacity-90 transition">
        Mettre à jour
      </button>
      <a href="{{ route('admin.blog-posts.index') }}"
         class="px-6 py-2.5 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
        Annuler
      </a>
    </div>
  </form>
</div>
@endsection
