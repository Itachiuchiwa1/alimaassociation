@extends('admin.layouts.app')
@section('title', 'Images Galerie')

@section('content')
<div class="space-y-6">
  <div class="flex justify-between items-center">
    <h1 class="text-3xl font-bold">Images Galerie</h1>
    <a href="{{ route('admin.gallery-images.create') }}"
       class="px-6 py-2.5 bg-[var(--color-primary)] text-white rounded-lg hover:opacity-90 transition">
      ➕ Ajouter une image
    </a>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($images as $image)
      <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition">
        <img src="{{ asset($image->image_path) }}" alt="{{ $image->title }}" class="w-full h-40 object-cover">
        <div class="p-4">
          <h3 class="font-semibold text-sm mb-1">{{ $image->title }}</h3>
          <p class="text-xs text-gray-600 mb-3">Catégorie: {{ $image->category->name }}</p>
          <div class="flex gap-2">
            <a href="{{ route('admin.gallery-images.edit', $image) }}"
               class="flex-1 px-3 py-1.5 bg-blue-100 text-blue-700 rounded text-xs hover:bg-blue-200 transition text-center">
              Éditer
            </a>
            <form action="{{ route('admin.gallery-images.destroy', $image) }}" method="POST" class="flex-1"
                  onsubmit="return confirm('Êtes-vous sûr ?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="w-full px-3 py-1.5 bg-red-100 text-red-700 rounded text-xs hover:bg-red-200 transition">
                Supprimer
              </button>
            </form>
          </div>
        </div>
      </div>
    @empty
      <div class="col-span-full text-center py-12">
        <p class="text-gray-500 mb-2">Aucune image.</p>
        <a href="{{ route('admin.gallery-images.create') }}" class="text-[var(--color-primary)] hover:underline">Ajouter la première</a>.
      </div>
    @endforelse
  </div>

  @if($images->hasPages())
    <div class="flex justify-center">
      {{ $images->links() }}
    </div>
  @endif
</div>
@endsection
