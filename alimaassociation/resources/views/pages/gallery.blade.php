@extends('layouts.app')
@section('title',       'Galerie — DÉMÉ')
@section('description', 'Photos et vidéos de nos formations, campagnes et événements.')

@section('content')

{{-- En-tête --}}
<section class="gradient-soft">
  <div class="container-page py-20 text-center max-w-3xl mx-auto animate-fade-up">
    <span class="text-sm font-semibold uppercase tracking-widest text-[var(--color-primary)]">Galerie</span>
    <h1 class="mt-3 text-4xl md:text-6xl font-bold">
      Nos <span class="text-gradient">moments</span> partagés.
    </h1>
    <p class="mt-4 text-[var(--color-muted-foreground)]">
      Photos et vidéos de nos actions sur le terrain.
    </p>
  </div>
</section>

{{-- Galerie avec filtres --}}
<section class="container-page py-12">

  {{-- Filtres --}}
  <div class="flex flex-wrap gap-2 justify-center mb-10">
    @foreach(['Toutes', 'Formations', 'Campagnes', 'Accompagnement', 'Événements'] as $i => $cat)
      <button data-filter-btn="{{ $cat }}"
              class="px-5 py-2 rounded-full text-sm font-medium border transition
                     {{ $i === 0
                         ? 'gradient-cta text-white border-transparent shadow-soft'
                         : 'bg-[var(--color-card)] border-[var(--color-border)] hover:border-[var(--color-primary)]' }}">
        {{ $cat }}
      </button>
    @endforeach
  </div>

  {{-- Grille photos --}}
  <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @foreach([
      ['src' => 'hero-girls.jpg',           'cat' => 'Événements',     'title' => 'Rencontre communautaire'],
      ['src' => 'action-formation.jpg',     'cat' => 'Formations',     'title' => 'Atelier santé'],
      ['src' => 'action-campagne.jpg',      'cat' => 'Campagnes',      'title' => 'Caravane mobile'],
      ['src' => 'action-accompagnement.jpg','cat' => 'Accompagnement', 'title' => 'Mentorat'],
      ['src' => 'action-formation.jpg',     'cat' => 'Formations',     'title' => 'Paires-éducatrices'],
      ['src' => 'action-campagne.jpg',      'cat' => 'Campagnes',      'title' => 'Sensibilisation scolaire'],
      ['src' => 'hero-girls.jpg',           'cat' => 'Événements',     'title' => 'Journée internationale'],
      ['src' => 'action-accompagnement.jpg','cat' => 'Accompagnement', 'title' => 'Écoute confidentielle'],
    ] as $i => $photo)
      <figure data-cat="{{ $photo['cat'] }}"
              class="group relative overflow-hidden rounded-2xl aspect-square shadow-soft animate-fade-up"
              style="animation-delay: {{ $i * 60 }}ms">
        <img src="{{ asset('assets/images/' . $photo['src']) }}"
             alt="{{ $photo['title'] }}" loading="lazy"
             class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
        <figcaption class="absolute inset-0 bg-gradient-to-t from-[var(--color-deep)]/90
                           via-[var(--color-deep)]/30 to-transparent flex flex-col justify-end p-4
                           opacity-0 group-hover:opacity-100 transition">
          <span class="text-xs text-[var(--color-secondary)] font-semibold">{{ $photo['cat'] }}</span>
          <span class="text-sm text-white font-medium">{{ $photo['title'] }}</span>
        </figcaption>
      </figure>
    @endforeach
  </div>

  <p class="text-center text-sm text-[var(--color-muted-foreground)] mt-12">
    📸 Espaces réservés — les vraies photos et vidéos seront ajoutées prochainement.
  </p>
</section>

@endsection
