@extends('admin.layouts.app')
@section('title', 'Catégories Galerie')

@section('content')
<div class="space-y-6">
  <div class="flex justify-between items-center">
    <h1 class="text-3xl font-bold">Catégories Galerie</h1>
    <a href="{{ route('admin.gallery-categories.create') }}"
       class="px-6 py-2.5 bg-[var(--color-primary)] text-white rounded-lg hover:opacity-90 transition">
      ➕ Ajouter
    </a>
  </div>

  <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
    <table class="w-full">
      <thead class="bg-gray-50 border-b border-gray-200">
        <tr>
          <th class="px-6 py-3 text-left text-sm font-semibold">Nom</th>
          <th class="px-6 py-3 text-left text-sm font-semibold">Images</th>
          <th class="px-6 py-3 text-left text-sm font-semibold">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        @forelse($categories as $cat)
          <tr class="hover:bg-gray-50 transition">
            <td class="px-6 py-4 text-sm">{{ $cat->name }}</td>
            <td class="px-6 py-4 text-sm">{{ $cat->images_count }}</td>
            <td class="px-6 py-4 text-sm space-x-2">
              <a href="{{ route('admin.gallery-categories.edit', $cat) }}"
                 class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition">
                Éditer
              </a>
              <form action="{{ route('admin.gallery-categories.destroy', $cat) }}" method="POST" class="inline-block"
                    onsubmit="return confirm('Êtes-vous sûr ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 transition">
                  Supprimer
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="3" class="px-6 py-12 text-center text-gray-500">
              Aucune catégorie. <a href="{{ route('admin.gallery-categories.create') }}" class="text-[var(--color-primary)] hover:underline">Créer la première</a>.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if($categories->hasPages())
    <div class="flex justify-center">
      {{ $categories->links() }}
    </div>
  @endif
</div>
@endsection
