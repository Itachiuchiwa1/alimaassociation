@extends('layouts.app')
@section('title',       'À propos — DÉMÉ')
@section('description', 'Histoire, mission, vision et valeurs de l\'association DÉMÉ.')

@section('content')

{{-- Intro --}}
<section class="gradient-soft">
  <div class="container-page py-20 md:py-28 text-center max-w-3xl mx-auto animate-fade-up">
    <span class="text-sm font-semibold uppercase tracking-widest text-[var(--color-primary)]">À propos</span>
    <h1 class="mt-3 text-4xl md:text-6xl font-bold leading-tight">
      Notre histoire, <span class="text-gradient">notre engagement</span>.
    </h1>
    <p class="mt-5 text-[var(--color-muted-foreground)] text-lg">
      DÉMÉ est née de la conviction que la santé et l'épanouissement des jeunes filles
      sont les fondations d'une société plus juste.
    </p>
  </div>
</section>

{{-- Histoire --}}
<section class="container-page py-20 grid md:grid-cols-2 gap-12 items-center">
  <img src="{{ asset('assets/images/action-accompagnement.jpg') }}"
       alt="Accompagnement" loading="lazy"
       class="rounded-3xl shadow-soft object-cover aspect-[4/3] w-full">
  <div>
    <h2 class="text-3xl md:text-4xl font-bold">Une histoire, une promesse</h2>
    <p class="mt-4 text-[var(--color-muted-foreground)] leading-relaxed">
      Fondée par un collectif de femmes engagées, DÉMÉ accompagne les jeunes filles
      depuis ses débuts à travers ateliers, écoute et campagnes communautaires. Notre
      credo : « Ne laisse personne derrière ». Chaque fille compte.
    </p>
    <p class="mt-3 text-[var(--color-muted-foreground)] leading-relaxed">
      Nous travaillons main dans la main avec les écoles, les familles et les leaders
      communautaires pour briser les tabous et offrir des espaces sûrs d'apprentissage.
    </p>
  </div>
</section>

{{-- Piliers --}}
<section class="container-page pb-20 grid md:grid-cols-3 gap-6">
  @foreach([
    [
      'title' => 'Notre mission',
      'text'  => 'Promouvoir le bien-être, la santé sexuelle et l\'autonomie des jeunes filles à travers la sensibilisation, la formation et l\'accompagnement.',
      'icon'  => 'target',
    ],
    [
      'title' => 'Notre vision',
      'text'  => 'Une société où chaque jeune fille a accès à l\'information, aux soins et aux opportunités, sans être laissée derrière.',
      'icon'  => 'eye',
    ],
    [
      'title' => 'Nos valeurs',
      'text'  => 'Bienveillance, dignité, équité, engagement communautaire et confidentialité absolue.',
      'icon'  => 'heart',
    ],
  ] as $i => $p)
    <div class="bg-[var(--color-card)] border border-[var(--color-border)] rounded-3xl p-7
                shadow-soft hover:shadow-glow transition animate-fade-up"
         style="animation-delay: {{ $i * 100 }}ms">
      <div class="p-3 rounded-2xl gradient-cta text-white inline-flex">
        @if($p['icon'] === 'target')
          <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>
          </svg>
        @elseif($p['icon'] === 'eye')
          <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
            <circle cx="12" cy="12" r="3"/>
          </svg>
        @else
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
          </svg>
        @endif
      </div>
      <h3 class="mt-4 font-display text-xl font-semibold">{{ $p['title'] }}</h3>
      <p class="mt-2 text-sm text-[var(--color-muted-foreground)] leading-relaxed">{{ $p['text'] }}</p>
    </div>
  @endforeach
</section>

{{-- Objectifs --}}
<section class="bg-[var(--color-deep)] text-[var(--color-deep-foreground)] py-20">
  <div class="container-page grid md:grid-cols-2 gap-12 items-center">
    <div>
      <span class="text-sm font-semibold uppercase tracking-widest text-[var(--color-secondary)]">Objectifs 2025–2027</span>
      <h2 class="mt-3 text-3xl md:text-5xl font-bold">Ce que nous voulons accomplir.</h2>
    </div>
    <ul class="space-y-3">
      @foreach([
        'Sensibiliser 10 000 jeunes filles d\'ici 2027',
        'Former 500 paires-éducatrices dans les communautés',
        'Établir 20 espaces sûrs d\'écoute',
        'Distribuer du matériel d\'hygiène mensuel',
      ] as $goal)
        <li class="flex gap-3 items-start bg-white/5 backdrop-blur rounded-2xl p-4 border border-white/10">
          <svg class="h-5 w-5 text-[var(--color-secondary)] mt-0.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
            <polyline points="22 4 12 14.01 9 11.01"/>
          </svg>
          <span>{{ $goal }}</span>
        </li>
      @endforeach
    </ul>
  </div>
</section>

@endsection
