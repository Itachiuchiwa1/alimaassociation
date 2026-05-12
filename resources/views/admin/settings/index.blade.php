@extends('admin.layouts.app')
@section('title', 'Paramètres')

@section('content')
<div class="max-w-2xl mx-auto">
  <h1 class="text-3xl font-bold mb-6">Paramètres du site</h1>

  <form action="{{ route('admin.settings.update') }}" method="POST"
        class="space-y-5 bg-white p-6 rounded-lg border border-gray-200">
    @csrf

    <div>
      <label class="block text-sm font-semibold mb-2">Adresse</label>
      <input type="text" name="address" value="{{ old('address', $address) }}" maxlength="255"
             class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent @error('address') border-red-500 @enderror">
      @error('address') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="block text-sm font-semibold mb-2">Téléphone</label>
      <input type="tel" name="phone" value="{{ old('phone', $phone) }}" maxlength="20"
             class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent @error('phone') border-red-500 @enderror">
      @error('phone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="block text-sm font-semibold mb-2">Email</label>
      <input type="email" name="email" value="{{ old('email', $email) }}" maxlength="255"
             class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent @error('email') border-red-500 @enderror">
      @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex gap-3 pt-4 border-t border-gray-200">
      <button type="submit" class="px-6 py-2.5 bg-[var(--color-primary)] text-white rounded-lg hover:opacity-90 transition">
        Enregistrer
      </button>
    </div>
  </form>
</div>
@endsection
