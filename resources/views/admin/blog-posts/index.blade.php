@extends('admin.layouts.app')
@section('title', 'Articles Blog')

@section('content')
<div class="space-y-6">
  <div class="flex justify-between items-center">
    <h1 class="text-3xl font-bold">Articles Blog</h1>
    <a href="{{ route('admin.blog-posts.create') }}"
       class="px-6 py-2.5 bg-[var(--color-primary)] text-white rounded-lg hover:opacity-90 transition">
      ➕ Ajouter un article
    </a>
  </div>

  <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
    <table class="w-full">
      <thead class="bg-gray-50 border-b border-gray-200">
        <tr>
          <th class="px-6 py-3 text-left text-sm font-semibold">Titre</th>
          <th class="px-6 py-3 text-left text-sm font-semibold">Catégorie</th>
          <th class="px-6 py-3 text-left text-sm font-semibold">Publié</th>
          <th class="px-6 py-3 text-left text-sm font-semibold">Date</th>
          <th class="px-6 py-3 text-left text-sm font-semibold">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        @forelse($posts as $post)
          <tr class="hover:bg-gray-50 transition">
            <td class="px-6 py-4 text-sm">{{ $post->title }}</td>
            <td class="px-6 py-4 text-sm">{{ $post->category->name ?? '—' }}</td>
            <td class="px-6 py-4 text-sm">
              <span class="px-3 py-1 rounded-full text-xs font-medium {{ $post->is_published ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                {{ $post->is_published ? 'Oui' : 'Non' }}
              </span>
            </td>
            <td class="px-6 py-4 text-sm">{{ $post->published_at?->format('d/m/Y') ?? '—' }}</td>
            <td class="px-6 py-4 text-sm space-x-2">
              <a href="{{ route('admin.blog-posts.edit', $post) }}"
                 class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition">
                Éditer
              </a>
              <form action="{{ route('admin.blog-posts.destroy', $post) }}" method="POST" class="inline-block"
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
            <td colspan="5" class="px-6 py-12 text-center text-gray-500">
              Aucun article. <a href="{{ route('admin.blog-posts.create') }}" class="text-[var(--color-primary)] hover:underline">Créer le premier</a>.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if($posts->hasPages())
    <div class="flex justify-center">
      {{ $posts->links() }}
    </div>
  @endif
</div>
@endsection
