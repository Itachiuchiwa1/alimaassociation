@extends('admin.layouts.app')
@section('title', 'Créer une action')

@section('content')
<div class="max-w-2xl mx-auto">
  <h1 class="text-3xl font-bold mb-6">Créer une action</h1>

  <form action="{{ route('admin.actions.store') }}" method="POST" enctype="multipart/form-data"
        class="space-y-5 bg-white p-6 rounded-lg border border-gray-200">
    @csrf

    <div>
      <label class="block text-sm font-semibold mb-2">Titre *</label>
      <input type="text" name="title" value="{{ old('title') }}"
             class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent @error('title') border-red-500 @enderror"
             required>
      @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="block text-sm font-semibold mb-2">Description *</label>
      <textarea name="description" rows="4"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent @error('description') border-red-500 @enderror"
                required>{{ old('description') }}</textarea>
      @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="block text-sm font-semibold mb-2">Icône *</label>
      <select name="icon"
              class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent"
              required>
        <option value="">Sélectionner une icône</option>
        <option value="megaphone" {{ old('icon') === 'megaphone' ? 'selected' : '' }}>Mégaphone</option>
        <option value="book" {{ old('icon') === 'book' ? 'selected' : '' }}>Livre</option>
        <option value="graduation" {{ old('icon') === 'graduation' ? 'selected' : '' }}>Graduation</option>
        <option value="heart" {{ old('icon') === 'heart' ? 'selected' : '' }}>Cœur</option>
        <option value="users" {{ old('icon') === 'users' ? 'selected' : '' }}>Utilisateurs</option>
        <option value="shield" {{ old('icon') === 'shield' ? 'selected' : '' }}>Bouclier</option>
      </select>
      @error('icon') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="block text-sm font-semibold mb-2">Image</label>
      <input type="file" name="image" accept="image/*"
             class="w-full px-4 py-2.5 border border-gray-300 rounded-lg @error('image') border-red-500 @enderror">
      <p class="text-xs text-gray-500 mt-1">PNG, JPG, GIF — Max 2 MB</p>
      @error('image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="block text-sm font-semibold mb-2">Ordre d'affichage</label>
      <input type="number" name="order" value="{{ old('order', 0) }}"
             class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent">
    </div>

    <div>
      <label class="flex items-center gap-2">
        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
        <span class="text-sm font-semibold">Actif</span>
      </label>
    </div>

    <div class="flex gap-3 pt-4 border-t border-gray-200">
      <button type="submit" class="px-6 py-2.5 bg-[var(--color-primary)] text-white rounded-lg hover:opacity-90 transition">
        Créer
      </button>
      <a href="{{ route('admin.actions.index') }}"
         class="px-6 py-2.5 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
        Annuler
      </a>
    </div>
  </form>
</div>
@endsection
