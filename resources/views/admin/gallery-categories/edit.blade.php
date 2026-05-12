@extends('admin.layouts.app')
@section('title', 'Éditer une catégorie')

@section('content')
<div class="max-w-2xl mx-auto">
  <h1 class="text-3xl font-bold mb-6">Éditer la catégorie</h1>

  <form action="{{ route('admin.gallery-categories.update', $galleryCategory) }}" method="POST"
        class="space-y-5 bg-white p-6 rounded-lg border border-gray-200">
    @csrf
    @method('PUT')

    <div>
      <label class="block text-sm font-semibold mb-2">Nom *</label>
      <input type="text" name="name" value="{{ old('name', $galleryCategory->name) }}"
             class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent @error('name') border-red-500 @enderror"
             required>
      @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex gap-3 pt-4 border-t border-gray-200">
      <button type="submit" class="px-6 py-2.5 bg-[var(--color-primary)] text-white rounded-lg hover:opacity-90 transition">
        Mettre à jour
      </button>
      <a href="{{ route('admin.gallery-categories.index') }}"
         class="px-6 py-2.5 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
        Annuler
      </a>
    </div>
  </form>
</div>
@endsection
