@extends('layouts.app')
@section('title',       'Faire un don — DÉMÉ')
@section('description', 'Soutenez DÉMÉ. Don unique ou récurrent. Chaque contribution change une vie.')

@section('content')

{{-- Hero --}}
<section class="relative gradient-hero text-[var(--color-deep-foreground)] overflow-hidden">
  <div class="container-page py-20 md:py-28 text-center max-w-3xl mx-auto animate-fade-up">
    <svg class="h-12 w-12 mx-auto mb-5 text-[var(--color-secondary)] animate-float"
         fill="currentColor" viewBox="0 0 24 24">
      <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
    </svg>
    <h1 class="text-4xl md:text-6xl font-bold leading-tight">Votre don, leur avenir.</h1>
    <p class="mt-5 text-lg opacity-90">
      Chaque contribution finance directement nos actions sur le terrain.
    </p>
  </div>
</section>

{{-- Formulaire + Projets --}}
<section class="container-page py-16 grid lg:grid-cols-5 gap-8">

  {{-- ── Formulaire don ──────────────────────────────────── --}}
  <div class="lg:col-span-3 bg-[var(--color-card)] rounded-3xl p-8
              border border-[var(--color-border)] shadow-soft">
    <h2 class="font-display text-2xl font-semibold">Faire un don maintenant</h2>

    @if(session('don_success'))
      <div class="mt-4 rounded-xl bg-green-50 border border-green-200 text-green-700 px-4 py-3 text-sm">
        ✓ {{ session('don_success') }}
      </div>
    @endif

    <form id="don-form" action="{{ route('donation.store') }}" method="POST">
      @csrf

      {{-- Type de don --}}
      <div class="mt-6">
        <label class="text-sm font-medium">Type de don</label>
        <div class="mt-2 grid grid-cols-2 gap-3">
          <button type="button" data-recurrence="0"
                  class="px-4 py-3 rounded-xl border font-medium transition
                         gradient-cta text-white border-transparent">
            <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/>
              <line x1="1" y1="10" x2="23" y2="10"/>
            </svg>
            Don unique
          </button>
          <button type="button" data-recurrence="1"
                  class="px-4 py-3 rounded-xl border font-medium transition
                         bg-[var(--color-background)] border-[var(--color-border)]
                         hover:border-[var(--color-primary)]">
            <svg class="h-4 w-4 inline mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <polyline points="17 1 21 5 17 9"/>
              <path d="M3 11V9a4 4 0 0 1 4-4h14"/>
              <polyline points="7 23 3 19 7 15"/>
              <path d="M21 13v2a4 4 0 0 1-4 4H3"/>
            </svg>
            Don mensuel
          </button>
        </div>
        <input type="hidden" id="don-recurrent" name="recurrent" value="0">
      </div>

      {{-- Montants --}}
      <div class="mt-6">
        <label class="text-sm font-medium">Montant suggéré (€)</label>
        <div class="mt-2 flex flex-wrap gap-2">
          @foreach([10, 25, 50, 100, 250] as $preset)
            <button type="button" data-preset="{{ $preset }}"
                    class="px-5 py-2.5 rounded-full font-semibold border transition
                           {{ $preset === 25
                               ? 'gradient-cta text-white border-transparent shadow-soft'
                               : 'bg-[var(--color-background)] border-[var(--color-border)] hover:border-[var(--color-primary)]' }}">
              {{ $preset }} €
            </button>
          @endforeach
          <input type="number"
                 id="don-custom"
                 name="amount"
                 value="25"
                 min="1"
                 class="w-28 px-4 py-2.5 rounded-full border border-[var(--color-border)]
                        bg-[var(--color-background)] focus:outline-none
                        focus:ring-2 focus:ring-[var(--color-primary)]">
        </div>
      </div>

      {{-- Identité --}}
      <div class="mt-6 grid sm:grid-cols-2 gap-3">
        <input name="prenom" placeholder="Prénom" maxlength="100"
               class="px-4 py-3 rounded-xl border border-[var(--color-input)]
                      bg-[var(--color-background)] focus:outline-none
                      focus:ring-2 focus:ring-[var(--color-primary)]">
        <input name="nom" placeholder="Nom" maxlength="100"
               class="px-4 py-3 rounded-xl border border-[var(--color-input)]
                      bg-[var(--color-background)] focus:outline-none
                      focus:ring-2 focus:ring-[var(--color-primary)]">
        <input name="email" type="email" placeholder="Email" maxlength="255"
               class="sm:col-span-2 px-4 py-3 rounded-xl border border-[var(--color-input)]
                      bg-[var(--color-background)] focus:outline-none
                      focus:ring-2 focus:ring-[var(--color-primary)]">
      </div>

      {{-- Bouton --}}
      <button id="don-display" type="submit"
              class="mt-6 w-full gradient-cta text-white font-semibold py-4 rounded-full
                     shadow-soft hover:shadow-glow transition inline-flex items-center
                     justify-center gap-2">
        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
          <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
        </svg>
        Donner 25 €
      </button>

      <p class="text-xs text-[var(--color-muted-foreground)] text-center mt-3">
        Paiements à venir : Orange Money · Moov Money · Wave · PayPal · Stripe
      </p>
    </form>
  </div>

  {{-- ── Projets soutenus ─────────────────────────────────── --}}
  <div class="lg:col-span-2 space-y-6">
    <h3 class="font-display text-xl font-semibold">Projets soutenus</h3>
    @foreach([
      ['title' => 'Kits d\'hygiène mensuels',     'raised' => 4200,  'goal' => 6000],
      ['title' => 'Programme de formation 2026',   'raised' => 8500,  'goal' => 12000],
      ['title' => 'Caravane communautaire',         'raised' => 2100,  'goal' => 5000],
    ] as $p)
      @php $pct = min(100, round($p['raised'] / $p['goal'] * 100)); @endphp
      <div class="bg-[var(--color-card)] rounded-2xl p-5 border border-[var(--color-border)] shadow-soft">
        <div class="flex justify-between text-sm font-medium">
          <span>{{ $p['title'] }}</span>
          <span class="text-[var(--color-primary)]">{{ $pct }}%</span>
        </div>
        <div class="mt-2 h-2.5 rounded-full bg-[var(--color-muted)] overflow-hidden">
          <div class="h-full gradient-cta transition-all duration-1000"
               style="width: {{ $pct }}%"></div>
        </div>
        <div class="mt-2 text-xs text-[var(--color-muted-foreground)]">
          {{ number_format($p['raised'], 0, ',', ' ') }} € collectés
          sur {{ number_format($p['goal'], 0, ',', ' ') }} €
        </div>
      </div>
    @endforeach
  </div>
</section>

{{-- Impact --}}
<section class="bg-[var(--color-deep)] text-[var(--color-deep-foreground)] py-20">
  <div class="container-page">
    <div class="text-center max-w-2xl mx-auto mb-10">
      <span class="text-sm font-semibold uppercase tracking-widest text-[var(--color-secondary)]">Impact</span>
      <h2 class="mt-3 text-3xl md:text-5xl font-bold">Ce que vos dons rendent possible.</h2>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
      @foreach([
        ['v' => '10 €',  't' => 'Un kit d\'hygiène mensuel pour une jeune fille'],
        ['v' => '50 €',  't' => 'Une session de formation pour 5 paires-éducatrices'],
        ['v' => '250 €', 't' => 'Une caravane de sensibilisation dans un village'],
      ] as $x)
        <div class="bg-white/5 backdrop-blur border border-white/10 rounded-2xl p-6">
          <svg class="h-6 w-6 text-[var(--color-secondary)]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
            <polyline points="22 4 12 14.01 9 11.01"/>
          </svg>
          <div class="mt-3 text-3xl font-display font-bold">{{ $x['v'] }}</div>
          <div class="text-sm opacity-80 mt-1">{{ $x['t'] }}</div>
        </div>
      @endforeach
    </div>

    {{-- Témoignages --}}
    <div class="grid md:grid-cols-2 gap-6 mt-14">
      @foreach([
        ['name' => 'Aïssatou, 17 ans', 'text' => 'Grâce à DÉMÉ, j\'ai compris mon corps et repris confiance en moi.'],
        ['name' => 'Mariam, mère',      'text' => 'Ma fille est plus épanouie depuis qu\'elle a rejoint les ateliers.'],
      ] as $t)
        <blockquote class="bg-white/5 border border-white/10 rounded-2xl p-6">
          <p class="italic opacity-90">« {{ $t['text'] }} »</p>
          <footer class="mt-3 text-sm text-[var(--color-secondary)] font-semibold">
            — {{ $t['name'] }}
          </footer>
        </blockquote>
      @endforeach
    </div>
  </div>
</section>

@endsection
