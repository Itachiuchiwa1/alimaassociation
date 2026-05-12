@extends('layouts.app')
@section('title',       'Blog & Actualités — DÉMÉ')
@section('description', 'Articles, conseils santé, événements et activités récentes de l\'association DÉMÉ.')

@section('content')

{{-- En-tête --}}
<section class="gradient-soft">
  <div class="container-page py-20 text-center max-w-3xl mx-auto animate-fade-up">
    <span class="text-sm font-semibold uppercase tracking-widest text-[var(--color-primary)]">Blog & Actualités</span>
    <h1 class="mt-3 text-4xl md:text-6xl font-bold">
      Nos <span class="text-gradient">histoires</span> & conseils.
    </h1>
  </div>
</section>

{{-- Articles --}}
<section class="container-page py-16 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
  @foreach([
    [
      'title'   => 'L\'importance de l\'éducation menstruelle',
      'excerpt' => 'Pourquoi parler des règles est un acte de santé publique.',
      'date'    => '12 mars 2026',
      'img'     => 'action-formation.jpg',
      'cat'     => 'Conseils santé',
    ],
    [
      'title'   => 'Retour sur notre caravane communautaire',
      'excerpt' => '3 villages, 400 jeunes filles sensibilisées en une semaine.',
      'date'    => '28 février 2026',
      'img'     => 'action-campagne.jpg',
      'cat'     => 'Activités',
    ],
    [
      'title'   => 'Témoignage : « DÉMÉ a changé ma vie »',
      'excerpt' => 'Aïssatou raconte son parcours d\'auto-confiance.',
      'date'    => '10 février 2026',
      'img'     => 'action-accompagnement.jpg',
      'cat'     => 'Témoignages',
    ],
  ] as $i => $post)
    <article class="group bg-[var(--color-card)] rounded-3xl overflow-hidden border border-[var(--color-border)]
                    shadow-soft hover:shadow-glow hover:-translate-y-1 transition animate-fade-up"
             style="animation-delay: {{ $i * 100 }}ms">
      <div class="aspect-[16/10] overflow-hidden">
        <img src="{{ asset('assets/images/' . $post['img']) }}"
             alt="{{ $post['title'] }}" loading="lazy"
             class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
      </div>
      <div class="p-6">
        <div class="flex items-center gap-3 text-xs text-[var(--color-muted-foreground)] mb-2">
          <span class="px-2 py-0.5 rounded-full bg-[var(--color-accent)] text-[var(--color-accent-foreground)] font-medium">
            {{ $post['cat'] }}
          </span>
          <span class="inline-flex items-center gap-1">
            <svg class="h-3 w-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
              <line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/>
              <line x1="3" y1="10" x2="21" y2="10"/>
            </svg>
            {{ $post['date'] }}
          </span>
        </div>
        <h3 class="font-display font-semibold text-lg leading-snug">{{ $post['title'] }}</h3>
        <p class="mt-2 text-sm text-[var(--color-muted-foreground)] leading-relaxed">{{ $post['excerpt'] }}</p>
        <a href="{{ route('blog') }}"
           class="mt-4 inline-flex items-center gap-1 text-[var(--color-primary)] text-sm font-semibold hover:gap-2 transition-all">
          Lire l'article
          <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
          </svg>
        </a>
      </div>
    </article>
  @endforeach
</section>

@endsection
