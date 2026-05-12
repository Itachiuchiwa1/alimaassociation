@extends('admin.layouts.app')
@section('title', 'Actions')

@section('content')
<div class="space-y-6">
  <div class="flex justify-between items-center">
    <h1 class="text-3xl font-bold">Actions</h1>
    <a href="{{ route('admin.actions.create') }}"
       class="px-6 py-2.5 bg-[var(--color-primary)] text-white rounded-lg hover:opacity-90 transition">
      ➕ Ajouter une action
    </a>
  </div>

  <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
    <table class="w-full">
      <thead class="bg-gray-50 border-b border-gray-200">
        <tr>
          <th class="px-6 py-3 text-left text-sm font-semibold">Titre</th>
          <th class="px-6 py-3 text-left text-sm font-semibold">Icône</th>
          <th class="px-6 py-3 text-left text-sm font-semibold">Statut</th>
          <th class="px-6 py-3 text-left text-sm font-semibold">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        @forelse($actions as $action)
          <tr class="hover:bg-gray-50 transition">
            <td class="px-6 py-4 text-sm">{{ $action->title }}</td>
            <td class="px-6 py-4 text-sm">{{ $action->icon }}</td>
            <td class="px-6 py-4 text-sm">
              <span class="px-3 py-1 rounded-full text-xs font-medium {{ $action->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                {{ $action->is_active ? 'Actif' : 'Inactif' }}
              </span>
            </td>
            <td class="px-6 py-4 text-sm space-x-2">
              <a href="{{ route('admin.actions.edit', $action) }}"
                 class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition">
                Éditer
              </a>
              <form action="{{ route('admin.actions.destroy', $action) }}" method="POST" class="inline-block"
                    onsubmit="return confirm('Êtes-vous sûr ?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 transition">
                  Supprimer
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="px-6 py-12 text-center text-gray-500">
              Aucune action. <a href="{{ route('admin.actions.create') }}" class="text-[var(--color-primary)] hover:underline">Créer la première</a>.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if($actions->hasPages())
    <div class="flex justify-center">
      {{ $actions->links() }}
    </div>
  @endif
</div>
@endsection
