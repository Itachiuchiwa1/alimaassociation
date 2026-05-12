@extends('layouts.app')
@section('title',       'Nos actions — DÉMÉ')
@section('description', 'Sensibilisations, ateliers, formations, accompagnement et campagnes communautaires.')

@section('content')

{{-- En-tête --}}
<section class="gradient-soft">
  <div class="container-page py-20 md:py-28 text-center max-w-3xl mx-auto animate-fade-up">
    <span class="text-sm font-semibold uppercase tracking-widest text-[var(--color-primary)]">Nos actions</span>
    <h1 class="mt-3 text-4xl md:text-6xl font-bold leading-tight">
      Sur le <span class="text-gradient">terrain</span>, chaque jour.
    </h1>
    <p class="mt-5 text-[var(--color-muted-foreground)] text-lg">
      Découvrez les programmes qui changent concrètement la vie des jeunes filles.
    </p>
  </div>
</section>

{{-- Grille d'actions --}}
<section class="container-page py-20 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
  @foreach([
    ['title' => 'Sensibilisations',         'desc' => 'Causeries éducatives en milieu scolaire et communautaire pour briser les tabous.',     'img' => 'action-campagne.jpg',       'icon' => 'megaphone'],
    ['title' => 'Ateliers pratiques',        'desc' => 'Hygiène menstruelle, confiance en soi, prévention IST/VIH.',                            'img' => 'action-formation.jpg',      'icon' => 'book'],
    ['title' => 'Formations',                'desc' => 'Programmes structurés pour paires-éducatrices et leaders communautaires.',               'img' => 'action-formation.jpg',      'icon' => 'graduation'],
    ['title' => 'Accompagnement',            'desc' => 'Écoute, mentorat et orientation médicale ou psychosociale personnalisée.',                'img' => 'action-accompagnement.jpg', 'icon' => 'heart'],
    ['title' => 'Campagnes communautaires',  'desc' => 'Caravanes mobiles de sensibilisation dans les villages éloignés.',                       'img' => 'action-campagne.jpg',       'icon' => 'users'],
    ['title' => 'Espaces sûrs',              'desc' => 'Lieux confidentiels où les jeunes filles peuvent parler librement.',                     'img' => 'action-accompagnement.jpg', 'icon' => 'shield'],
  ] as $i => $item)
    <article class="group bg-[var(--color-card)] rounded-3xl overflow-hidden border border-[var(--color-border)]
                    shadow-soft hover:shadow-glow hover:-translate-y-1 transition animate-fade-up"
             style="animation-delay: {{ $i * 80 }}ms">
      <div class="aspect-[4/3] overflow-hidden relative">
        <img src="{{ asset('assets/images/' . $item['img']) }}"
             alt="{{ $item['title'] }}" loading="lazy"
             class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
        {{-- Badge icône --}}
        <div class="absolute top-3 left-3 p-2.5 rounded-xl bg-white/90 backdrop-blur text-[var(--color-primary)]">
          @if($item['icon'] === 'megaphone')
            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 11l19-9-9 19-2-8-8-2z"/></svg>
          @elseif($item['icon'] === 'book')
            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
          @elseif($item['icon'] === 'graduation')
            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
          @elseif($item['icon'] === 'heart')
            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
          @elseif($item['icon'] === 'users')
            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          @else
            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          @endif
        </div>
      </div>
      <div class="p-6">
        <h3 class="font-display font-semibold text-xl">{{ $item['title'] }}</h3>
        <p class="mt-2 text-sm text-[var(--color-muted-foreground)] leading-relaxed">{{ $item['desc'] }}</p>
      </div>
    </article>
  @endforeach
</section>

@endsection
