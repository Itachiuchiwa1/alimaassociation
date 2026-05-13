@extends('layouts.app')
@section('title',       'DÉMÉ — Ne Laisse Personne Derrière | Bien-être des jeunes filles')
@section('description', 'DÉMÉ accompagne les jeunes filles à travers la sensibilisation, la formation et le soutien communautaire.')

@section('content')

{{-- ══════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════ --}}
<section class="relative overflow-hidden">
  <div class="absolute inset-0">
    <img src="{{ asset('images/kid.jpeg') }}"
         alt="Jeunes filles souriantes"
         class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-r from-[var(--color-deep)]/90 via-[var(--color-deep)]/70 to-[var(--color-deep)]/30"></div>
  </div>

  <div class="relative container-page py-28 md:py-40 text-[var(--color-deep-foreground)]">
    <div class="max-w-2xl animate-fade-up">
      {{-- Badge --}}
      <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full
                   bg-white/10 backdrop-blur border border-white/20 text-sm">
        <svg class="h-3.5 w-3.5 text-[var(--color-secondary)]" viewBox="0 0 24 24" fill="currentColor">
          <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/>
        </svg>
        Association caritative — DÉMÉ
      </span>

      <h1 class="mt-6 text-4xl md:text-6xl lg:text-7xl font-bold leading-[1.05]">
        Ne laisse <span class="text-[var(--color-secondary)]">personne</span> derrière.
      </h1>

      <p class="mt-6 text-lg md:text-xl opacity-90 max-w-xl">
        Pour le bien-être et la santé sexuelle des jeunes filles. Ensemble, sensibilisons,
        formons et accompagnons celles qui construiront demain.
      </p>

      <div class="mt-9 flex flex-wrap gap-3">
        <a href="{{ route('donation') }}"
           class="inline-flex items-center gap-2 gradient-cta text-white font-semibold
                  px-6 py-3.5 rounded-full shadow-glow hover:-translate-y-0.5 transition">
          <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
          </svg>
          Faire un don
        </a>
        <a href="{{ route('contact') }}"
           class="inline-flex items-center gap-2 bg-white/10 backdrop-blur border border-white/30
                  text-white font-semibold px-6 py-3.5 rounded-full hover:bg-white/20 transition">
          Nous rejoindre
          <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
          </svg>
        </a>
        <a href="{{ route('actions') }}"
           class="inline-flex items-center gap-2 text-white/90 font-medium px-2 py-3.5 hover:text-[var(--color-secondary)] transition">
          Participer à une formation →
        </a>
      </div>
    </div>
  </div>
</section>

{{-- ══════════════════════════════════════════════════
     STATS
══════════════════════════════════════════════════ --}}
<section class="container-page -mt-12 relative z-10">
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4 bg-[var(--color-card)] rounded-3xl shadow-soft p-8 border border-[var(--color-border)]">
    @foreach([
      ['value' => '2 500+', 'label' => 'Jeunes filles accompagnées'],
      ['value' => '120',    'label' => 'Formations organisées'],
      ['value' => '45',     'label' => 'Campagnes communautaires'],
      ['value' => '30',     'label' => 'Communautés impactées'],
    ] as $i => $stat)
      <div class="text-center animate-fade-up" style="animation-delay: {{ $i * 100 }}ms">
        <div class="text-3xl md:text-4xl font-display font-bold text-gradient">{{ $stat['value'] }}</div>
        <div class="text-xs md:text-sm text-[var(--color-muted-foreground)] mt-1">{{ $stat['label'] }}</div>
      </div>
    @endforeach
  </div>
</section>

{{-- ══════════════════════════════════════════════════
     QUI SOMMES-NOUS
══════════════════════════════════════════════════ --}}
<section class="container-page py-24 grid md:grid-cols-2 gap-14 items-center">
  <div>
    <span class="text-sm font-semibold uppercase tracking-widest text-[var(--color-primary)]">Qui sommes-nous</span>
    <h2 class="mt-3 text-3xl md:text-5xl font-bold leading-tight">
      Une voix pour chaque <span class="text-gradient">jeune fille</span>.
    </h2>
    <p class="mt-5 text-[var(--color-muted-foreground)] leading-relaxed">
      DÉMÉ est une association à but non lucratif qui œuvre pour l'autonomie, la santé et
      la dignité des jeunes filles. Nous croyons qu'aucune fille ne doit rester derrière —
      par manque d'information, d'accompagnement ou de soutien.
    </p>
    <a href="{{ route('about') }}"
       class="mt-7 inline-flex items-center gap-2 text-[var(--color-primary)] font-semibold hover:gap-3 transition-all">
      Découvrir notre histoire
      <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
      </svg>
    </a>
  </div>

  <div class="relative">
    <div class="absolute -inset-4 gradient-cta rounded-3xl blur-2xl opacity-20"></div>
    <img src="{{ asset('images/fille.jpeg') }}"
         alt="Mentorat" loading="lazy"
         class="relative rounded-3xl shadow-glow object-cover aspect-[4/3] w-full">
  </div>
</section>

{{-- ══════════════════════════════════════════════════
     NOS ACTIONS
══════════════════════════════════════════════════ --}}
<section class="gradient-soft py-24">
  <div class="container-page">
    <div class="text-center max-w-2xl mx-auto mb-14">
      <span class="text-sm font-semibold uppercase tracking-widest text-[var(--color-primary)]">Nos actions</span>
      <h2 class="mt-3 text-3xl md:text-5xl font-bold">Ce que nous faisons sur le terrain</h2>
    </div>

<div class="grid md:grid-cols-3 gap-6">
  @foreach([
    ['title' => 'Formations',      'desc' => 'Ateliers sur la santé sexuelle, l\'hygiène et la confiance en soi.', 'img' => 'serviette_hygienique_3.jpeg',      'icon' => 'graduation'],
    ['title' => 'Campagnes',       'desc' => 'Sensibilisation communautaire dans les écoles et villages.',          'img' => 'serviette_hygienique.jpeg',       'icon' => 'megaphone'],
    ['title' => 'Accompagnement',  'desc' => 'Écoute, mentorat et orientation personnalisée pour chaque jeune fille.','img' => 'photo_de_groupe.jpeg', 'icon' => 'heart'],
  ] as $i => $action)
    <article class="group bg-[var(--color-card)] rounded-3xl overflow-hidden border border-[var(--color-border)]
                    shadow-soft hover:shadow-glow hover:-translate-y-1 transition-all animate-fade-up"
             style="animation-delay: {{ $i * 120 }}ms">
      <div class="aspect-[4/3] overflow-hidden">
        <!-- Le chemin génère maintenant : public/images/serviette_hygienique_3.jpeg -->
        <img src="{{ asset('images/' . $action['img']) }}"
             alt="{{ $action['title'] }}" loading="lazy"
             class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
      </div>
      <div class="p-6">
        <div class="flex items-center gap-2.5 mb-3">
          <div class="p-2 rounded-xl gradient-cta text-white">
            @if($action['icon'] === 'graduation')
              <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                <path d="M6 12v5c3 3 9 3 12 0v-5"/>
              </svg>
            @elseif($action['icon'] === 'megaphone')
              <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 11l19-9-9 19-2-8-8-2z"/>
              </svg>
            @else
              <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
              </svg>
            @endif
          </div>
          <h3 class="font-display font-semibold text-xl">{{ $action['title'] }}</h3>
        </div>
        <p class="text-sm text-[var(--color-muted-foreground)] leading-relaxed">{{ $action['desc'] }}</p>
      </div>
    </article>
  @endforeach
</div>


    <div class="text-center mt-10">
      <a href="{{ route('actions') }}"
         class="inline-flex items-center gap-2 text-[var(--color-primary)] font-semibold hover:gap-3 transition-all">
        Voir toutes nos actions
        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
        </svg>
      </a>
    </div>
  </div>
</section>

{{-- ══════════════════════════════════════════════════
     CTA
══════════════════════════════════════════════════ --}}
<section class="container-page py-24">
  <div class="relative overflow-hidden rounded-3xl gradient-hero p-10 md:p-16 text-center
              text-[var(--color-deep-foreground)] shadow-glow">
    <svg class="h-12 w-12 mx-auto mb-5 opacity-80" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
      <circle cx="9" cy="7" r="4"/>
      <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
      <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
    </svg>
    <h2 class="text-3xl md:text-5xl font-bold max-w-2xl mx-auto leading-tight">
      Votre soutien change des vies.
    </h2>
    <p class="mt-4 opacity-90 max-w-xl mx-auto">
      Chaque don finance des formations, du matériel d'hygiène et l'accompagnement des
      jeunes filles dans leurs communautés.
    </p>
    <a href="{{ route('donation') }}"
       class="mt-8 inline-flex items-center gap-2 bg-white text-[var(--color-primary)] font-semibold
              px-7 py-3.5 rounded-full hover:bg-[var(--color-secondary)] hover:text-[var(--color-deep)] transition">
      <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
      </svg>
      Faire un don maintenant
    </a>
  </div>
</section>

@endsection
