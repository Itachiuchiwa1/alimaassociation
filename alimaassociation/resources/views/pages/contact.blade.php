@extends('layouts.app')
@section('title',       'Contact — DÉMÉ')
@section('description', 'Contactez l\'association DÉMÉ ou posez une question anonyme en toute confidentialité.')

@section('content')

{{-- En-tête --}}
<section class="gradient-soft">
  <div class="container-page py-20 text-center max-w-3xl mx-auto animate-fade-up">
    <span class="text-sm font-semibold uppercase tracking-widest text-[var(--color-primary)]">Contact</span>
    <h1 class="mt-3 text-4xl md:text-6xl font-bold">
      Parlons <span class="text-gradient">ensemble</span>.
    </h1>
  </div>
</section>

<section class="container-page py-16 grid lg:grid-cols-2 gap-10">

  {{-- ── Formulaire de contact ─────────────────────────────── --}}
  <div class="bg-[var(--color-card)] rounded-3xl p-8 border border-[var(--color-border)] shadow-soft">
    <h2 class="font-display text-2xl font-semibold">Écrivez-nous</h2>
    <p class="text-sm text-[var(--color-muted-foreground)] mt-1">
      Une question, un partenariat, une candidature ?
    </p>

    @if(session('contact_success'))
      <div class="mt-4 rounded-xl bg-green-50 border border-green-200 text-green-700 px-4 py-3 text-sm">
        ✓ {{ session('contact_success') }}
      </div>
    @endif

    <form id="contact-form"
          action="{{ route('contact.store') }}"
          method="POST"
          class="mt-6 space-y-4">
      @csrf
      <input name="name"
             placeholder="Votre nom"
             maxlength="100"
             value="{{ old('name') }}"
             class="w-full px-4 py-3 rounded-xl border border-[var(--color-input)]
                    bg-[var(--color-background)] focus:outline-none focus:ring-2
                    focus:ring-[var(--color-primary)] transition
                    @error('name') border-red-500 @enderror">
      @error('name') <p class="text-sm text-red-500">{{ $message }}</p> @enderror

      <input name="email"
             type="email"
             placeholder="Votre email"
             maxlength="255"
             value="{{ old('email') }}"
             class="w-full px-4 py-3 rounded-xl border border-[var(--color-input)]
                    bg-[var(--color-background)] focus:outline-none focus:ring-2
                    focus:ring-[var(--color-primary)] transition
                    @error('email') border-red-500 @enderror">
      @error('email') <p class="text-sm text-red-500">{{ $message }}</p> @enderror

      <textarea name="message"
                placeholder="Votre message"
                rows="5"
                maxlength="1000"
                class="w-full px-4 py-3 rounded-xl border border-[var(--color-input)]
                       bg-[var(--color-background)] focus:outline-none focus:ring-2
                       focus:ring-[var(--color-primary)] transition resize-none
                       @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
      @error('message') <p class="text-sm text-red-500">{{ $message }}</p> @enderror

      <button type="submit"
              class="inline-flex items-center gap-2 gradient-cta text-white font-semibold
                     px-6 py-3 rounded-full hover:shadow-glow transition">
        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <line x1="22" y1="2" x2="11" y2="13"/>
          <polygon points="22 2 15 22 11 13 2 9 22 2"/>
        </svg>
        Envoyer
      </button>
      <p id="contact-status" class="text-sm mt-2"></p>
    </form>
  </div>

  {{-- ── Colonne droite --}}
  <div class="space-y-6">

    {{-- Question anonyme --}}
    <div class="bg-[var(--color-deep)] text-[var(--color-deep-foreground)] rounded-3xl p-8 shadow-soft">
      <div class="flex items-center gap-2 text-[var(--color-secondary)]">
        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
          <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
        </svg>
        <span class="text-xs font-semibold uppercase tracking-widest">Espace sécurisé</span>
      </div>
      <h2 class="mt-2 font-display text-2xl font-semibold">Question anonyme</h2>
      <p class="text-sm opacity-80 mt-1">
        Posez votre question en toute confidentialité. Aucune donnée personnelle n'est requise.
      </p>

      @if(session('anon_success'))
        <div class="mt-4 rounded-xl bg-white/10 text-[var(--color-secondary)] px-4 py-3 text-sm">
          ✓ {{ session('anon_success') }}
        </div>
      @endif

      <form id="anon-form"
            action="{{ route('contact.store') }}"
            method="POST"
            class="mt-5 space-y-3">
        @csrf
        <input type="hidden" name="anonymous" value="1">
        <textarea name="question"
                  placeholder="Votre question..."
                  rows="4"
                  maxlength="1000"
                  class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20
                         text-white placeholder:text-white/50 focus:outline-none
                         focus:ring-2 focus:ring-[var(--color-secondary)] resize-none"></textarea>
        <button type="submit"
                class="inline-flex items-center gap-2 bg-[var(--color-secondary)]
                       text-[var(--color-deep)] font-semibold px-5 py-2.5 rounded-full
                       hover:bg-white transition">
          Envoyer anonymement
        </button>
        <p id="anon-status" class="text-sm mt-2"></p>
      </form>
    </div>

    {{-- Coordonnées --}}
    <div class="bg-[var(--color-card)] rounded-3xl p-8 border border-[var(--color-border)] shadow-soft space-y-4">
      @foreach([
        ['icon' => 'map', 'label' => 'Adresse',    'value' => 'Siège — à compléter'],
        ['icon' => 'tel', 'label' => 'Téléphone',  'value' => '+000 00 00 00 00'],
        ['icon' => 'mail','label' => 'Email',       'value' => 'contact@deme.org'],
      ] as $c)
        <div class="flex gap-3">
          <div class="mt-0.5">
            @if($c['icon'] === 'map')
              <svg class="h-5 w-5 text-[var(--color-primary)]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                <circle cx="12" cy="10" r="3"/>
              </svg>
            @elseif($c['icon'] === 'tel')
              <svg class="h-5 w-5 text-[var(--color-primary)]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.62 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>
              </svg>
            @else
              <svg class="h-5 w-5 text-[var(--color-primary)]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                <polyline points="22,6 12,13 2,6"/>
              </svg>
            @endif
          </div>
          <div>
            <div class="font-semibold">{{ $c['label'] }}</div>
            <div class="text-sm text-[var(--color-muted-foreground)]">{{ $c['value'] }}</div>
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>

@endsection
