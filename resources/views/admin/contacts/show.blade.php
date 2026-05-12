@extends('admin.layouts.app')
@section('title', 'Message de contact')

@section('content')
<div class="max-w-2xl mx-auto">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Message de contact</h1>
    <a href="{{ route('admin.contacts.index') }}"
       class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
      ← Retour
    </a>
  </div>

  <div class="bg-white rounded-lg border border-gray-200 p-6 space-y-4">
    @if(!$contact->is_anonymous)
      <div>
        <label class="text-sm font-semibold text-gray-600">Nom</label>
        <p class="text-lg">{{ $contact->name }}</p>
      </div>

      <div>
        <label class="text-sm font-semibold text-gray-600">Email</label>
        <p class="text-lg"><a href="mailto:{{ $contact->email }}" class="text-[var(--color-primary)] hover:underline">{{ $contact->email }}</a></p>
      </div>
    @else
      <div class="p-4 rounded-lg bg-purple-50 border border-purple-200">
        <p class="text-sm text-purple-800">
          <strong>Message anonyme</strong> — L'expéditeur n'a pas fourni ses coordonnées.
        </p>
      </div>
    @endif

    <div>
      <label class="text-sm font-semibold text-gray-600">
        {{ $contact->is_anonymous ? 'Question' : 'Message' }}
      </label>
      <div class="mt-2 p-4 rounded-lg bg-gray-50 border border-gray-200 whitespace-pre-wrap text-sm">
        {{ $contact->message ?? $contact->question }}
      </div>
    </div>

    <div class="pt-4 border-t border-gray-200">
      <p class="text-sm text-gray-600">
        Reçu le <strong>{{ $contact->created_at->format('d/m/Y à H:i') }}</strong>
      </p>
    </div>

    <div class="flex gap-3 pt-4 border-t border-gray-200">
      @if(!$contact->is_read)
        <form action="{{ route('admin.contacts.read', $contact) }}" method="POST" class="flex-1">
          @csrf
          @method('PATCH')
          <button type="submit" class="w-full px-4 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
            Marquer comme lu
          </button>
        </form>
      @endif

      <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="flex-1"
            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="w-full px-4 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
          Supprimer
        </button>
      </form>

      <a href="{{ route('admin.contacts.index') }}"
         class="flex-1 px-4 py-2.5 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition text-center">
        Retour
      </a>
    </div>
  </div>
</div>
@endsection
