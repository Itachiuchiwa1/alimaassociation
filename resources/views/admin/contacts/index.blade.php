@extends('admin.layouts.app')
@section('title', 'Contacts')

@section('content')
<div class="space-y-6">
  <h1 class="text-3xl font-bold">Messages de contact</h1>

  <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
    <table class="w-full">
      <thead class="bg-gray-50 border-b border-gray-200">
        <tr>
          <th class="px-6 py-3 text-left text-sm font-semibold">Expéditeur</th>
          <th class="px-6 py-3 text-left text-sm font-semibold">Type</th>
          <th class="px-6 py-3 text-left text-sm font-semibold">Lu</th>
          <th class="px-6 py-3 text-left text-sm font-semibold">Date</th>
          <th class="px-6 py-3 text-left text-sm font-semibold">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        @forelse($contacts as $contact)
          <tr class="hover:bg-gray-50 transition {{ !$contact->is_read ? 'bg-blue-50' : '' }}">
            <td class="px-6 py-4 text-sm">{{ $contact->name ?? '(Anonyme)' }}</td>
            <td class="px-6 py-4 text-sm">
              @if($contact->is_anonymous)
                <span class="px-2 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">Question anonyme</span>
              @else
                <span class="px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Contact</span>
              @endif
            </td>
            <td class="px-6 py-4 text-sm">
              @if($contact->is_read)
                <span class="text-gray-500">✓ Oui</span>
              @else
                <span class="text-orange-600 font-semibold">✗ Non</span>
              @endif
            </td>
            <td class="px-6 py-4 text-sm">{{ $contact->created_at->format('d/m/Y H:i') }}</td>
            <td class="px-6 py-4 text-sm space-x-2">
              <a href="{{ route('admin.contacts.show', $contact) }}"
                 class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition">
                Lire
              </a>
              <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline-block"
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
              Aucun message.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if($contacts->hasPages())
    <div class="flex justify-center">
      {{ $contacts->links() }}
    </div>
  @endif
</div>
@endsection
